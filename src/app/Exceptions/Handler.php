<?php

namespace App\Exceptions;

use App\Exceptions\OAuthExceptionHandler\OAuthExceptionHandler;
use App\Models\User;
use Hash;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Laravel\Passport\Exceptions\OAuthServerException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        "current_password",
        "password",
        "password_confirmation",
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof OAuthServerException) {
            $oAuthExceptionHandle = new OAuthExceptionHandler(
                $request,
                $exception
            );

            return $oAuthExceptionHandle
                ->handleUser()
                ->handleGrantType()
                ->renderException();
        }

        return parent::render($request, $exception);
    }
}
