<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\registrations;
use App\Models\profile_student;
use App\Models\Course;
use App\Models\courseregister;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class addgradeController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
      
        return view('addgrade.choosecourse');

    }

    public function create(Request $request)
    {
       $regs=registrations::where('course_id',$request->course_id)->get();
       return view('addgrade.show',compact('regs'));
    }

   
    public function store(Request $request,$id)
    {
        $grade=registrations::where('id',$id)->first();
        $grade->update(['grade' => $request->grade]);
         $this->cgpa($id);
        $regs=registrations::where('course_id',$grade->course_id)->get();
        Alert::success('The Grade is Updated Successfuly');
        return view('addgrade.show',compact('regs'));

    }

    public function cgpa($id)
    {
        $reg=registrations::where('id',$id)->first();
        $student=profile_student::where('id',$reg->student_id)->first();
        $cgpa=$student->cgpa;
        
        $course=Course::where('id',$reg->course_id)->first();
        $course_hours= $course->hours;

       if($reg->grade=='A'){
        $reg->grade_num='4.0';
        $reg->save();
        $student->cgpa= (($cgpa*$student->hours)+($course_hours*$reg->grade_num))/($student->hours+$course_hours);
        $student->hours= $student->hours+ $course_hours;
        $student->save();
      
       }elseif($reg->grade=='B'){
      
       }elseif($reg->grade=='F'){

        $reg->grade_num='0';
        $reg->save();
        $student->cgpa= (($cgpa*$student->hours)+($course_hours*$reg->grade_num))/($student->hours+$course_hours);
        $student->hours= $student->hours+ $course_hours;
        $student->save();
       
       }else{
       
       }

    }

  
      
}
