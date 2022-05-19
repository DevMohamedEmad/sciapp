<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\profile_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function __construct(){
        $this->middleware("auth");

    }

    public function index()
    {

       $user= user::latest()->paginate(10);
       return view('student.index',compact('user'));
    }

        public function create()
    {
       return view('student.create_profile');
    }


    public function store(Request $re)
    {
        $data=$re->validate([

            'id'=>'required',
            'password'=>'required',
        ]);

        $data=$re->only('id','password');

        $user = new User();
        $user->id=$data['id'];
        $user->password=hash::make($data['password']);
        $user->save();

        $profile=profile_student::create([
            'id'=>$re->id,
            'user_id'=>$re->id,
            'student_name'=>$re->student_name,
            'level'	=>$re->level,
            'hours'=>$re->hours,
            'cgpa'=>$re->cgpa,
            'major'=>$re->major,
            'minor'=>$re->minor,
        ]);


        return redirect()->route('user.index');
    }


    public function show(User $user)
    {
          return view('student.profile',compact('user'));
    }

    public function edit(User $user)

    {

       return view('student.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {

        $request->validate([
            'id'=>'required',
            'password'=>'required',

        ]);

        $user->update($request->all());
        return redirect()->route('user.index')
        ->with('success','course updated successfuly');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
        ->with('success','course deleted successfuly');
    }



    public function createProfile(){

        $profile=profile_student::create([
            'id'=>$id,
            'user_id'=>$id,
            'student_name'=>$re->student_name,
            'level'	=>$re->level,
            'hours'=>$re->hours,
            'cgpa'=>$re->cgpa,
            'major'=>$re->major,
            'minor'=>$re->minor,
        ]);
        return view('student.create_profile');
    }
}
