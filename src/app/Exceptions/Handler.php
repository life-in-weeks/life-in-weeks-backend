<?php

namespace App\Exceptions;

use App\Models\User;
use Hash;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
        if (
            $exception instanceof
            \Laravel\Passport\Exceptions\OAuthServerException
        ) {
            if ($request->grant_type !== "password") {
                return response()->json(
                    [
                        "message" => "Invalid grant type",
                    ],
                    400
                );
            }

            $user = User::where("username", $request->username)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(
                    [
                        "message" => "Invalid username or password",
                    ],
                    403
                );
            } else {
                return $exception->render($request);
            }
        }

        return parent::render($request, $exception);
    }
}
