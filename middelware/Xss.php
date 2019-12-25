<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Exception;
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
     * @return mixed
     * @throws Exception
     */
    public function handle($request, Closure $next, $guard = null)
    {
        foreach ($this->request->all() as $key => $input) {
            if (strlen($input) !== strlen(strip_tags($input))) {
                throw new Exception('Request contains xss attack');
            }
        }

        return $next($request);
    }

}
