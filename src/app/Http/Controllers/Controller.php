<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Life In Weeks"
 * ),
 * @OA\PathItem(
 *     path="/api"
 * ),
 * @OA\Components(
 *     @OA\SecurityScheme(
 *         securityScheme="bearerAuth",
 *         type="http",
 *         scheme="bearer"
 *     )
 * ),
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
