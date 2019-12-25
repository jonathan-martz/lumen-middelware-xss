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
            $this->check($input);
        }

        return $next($request);
    }

    public function checkString(string $input){
        if (strlen($input) !== strlen(strip_tags($input))) {
            throw new Exception('Request contains xss attack');
        }
    }

    public function checkArray(array $input){
        if(is_string($input)){
            $this->checkString($input);
        }
        else if(is_array($input)){
            foreach($input as $key => $item){
                $this->check($item);
            }
        }
    }

    public function check($input){
        if(is_string($input)){
            $this->checkString($input);
        }
        else if(is_array($input)){
            $this->checkArray($input);
        }
    }

}
