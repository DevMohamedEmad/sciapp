<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\profile_student;
use App\Traits\generalTrait;

class profile_studentController extends Controller
{
    use generalTrait;
    public function __construct(){
        $this->middleware("auth.guard:student-api");
    }

    public function index()
    {

        $user=Auth::user();

        $id=Auth::user()->id;

        if($user->profile == null){

            return $this->returnError("0001","Error in Admin");
        }
        else{

            $profile=$user->profile;
            return $this->returnData('student',$profile,"this is the data of the student");
        }
    }

   

}
