<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\User;
use Closure;
use Exception;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

/**
 * Class Xss
 *
 * @package App\Http\Middleware
 */
class Xss extends Controller
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @throws Exception
     */
    public function handle($request, Closure $next, $guard = null)
    {
        throw new Exception();
    }

}
