<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Traits\generalTrait;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Auth;
class AuthController extends Controller
{
    use generalTrait;

    public function login(Request $request){

      //validation

      $rules=[
        "id"=>"required|exists:users",
        "password"=>"required"
       ];

       $validator=Validator::make($request->all(),$rules);
       if($validator->fails()){
        $code = $this->returnCodeAccordingToInput($validator);
        return $this->returnValidationError($code, $validator);

          }

          //login
          $credentials=$request->only(['id','password']);
          $token=Auth::guard('student-api')->attempt($credentials);

          if(!$token)
          {
           return $this->returnError("011","unauthenticated");;
          }
          else {
             $student=Auth::guard('student-api')->user();
             $student->api_token=$token;
             return $this->returnData("api-Token",$token,"authenticated successfully");
             }


    }

    public function getCourseById(Request $request){
        $course=Course::where('id',$request->id)->first();

        if(!$course) {

          return $this->returnError("000","this id not found");
        }
       return $this->returnData("course",$course,"success");

    }

    public function logout(Request $request){

      $token=$request->header('auth-token');

      if($token){
        try {
          JWTAuth::setToken($token)->invalidate(); //logout
      }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
          return  $this -> returnError('','the Token is Invalid');
      }
       return $this->returnSuccessMessage("logout is Done");
      }else{

        return $this->returnError("111","the Token is wrong");

      }

     }
}
