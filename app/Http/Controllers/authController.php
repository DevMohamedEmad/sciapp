<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class authController extends Controller
{
   
    public function index()
    {
        return  view('auth.login');
    }

    public function postlogin(Request $st)
    {
      $admin="10";
      $data=$st->only("id","password");
      $data=$st->validate([

          'id'=>'required',
          'password'=>'required',
      ]);
      if(Auth::attempt($data)){
        if($data['id']==$admin){
          Alert::success('hello', 'Admin Page');
          return view('admin.dashboard',compact('data'));
        }else{
          $student=Auth::user();
          $student_name=$student->profile->student_name;
          Alert::success('Hello Student',  $student_name );
          return redirect()->route('profile');
        }        
        
      }else{
          return view('auth.login');
      }
    }
    
      public function logout(){
        Auth::logout();
        return view('auth.login');
      }
   

}