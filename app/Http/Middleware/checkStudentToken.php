<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;
use App\Http\Controllers\Api\BaseController;
use App\Traits\generalTrait;
class checkadmintoken 
{
    use generalTrait;
    public function handle(Request $request, Closure $next)
    {
        $user = null;
         try{
              $user = JWTAuth::parseToken()->authenticate();
            
            } catch (Exception $e) {
                if($e instanceof TokenInvalidException){
                 return $this->returnError("001",'invalidToken');
                }
                elseif($e instanceof TokenExpiredException){
                    return $this->returnError("001",'ExpiredToken');
                }
                else
                {
                    return $this-> returnError("001",'notfound user');
                }
            } catch (Throwable $e) {
                if($e instanceof TokenInvalidException){
                    return $this->returnError("false",'Unauthenticated user');
                   }
                   elseif($e instanceof TokenExpiredException){
                       return $this->returnError("false",'Expired user');
                   }
                   else
                   {
                       return $this->returnError("false",'notfound user');
                   }

            }
           if(!$user){

              return $this->returnError("false",'notfound user');
              return $next($request);

           }


        
       
    }
}

