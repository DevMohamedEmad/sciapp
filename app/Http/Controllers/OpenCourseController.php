<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\open_course;
use App\Models\course;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Traits\generalTrait;
use Validator;
use App\Models\registrations;
use App\Models\profile_student;

class OpenCourseController extends Controller
{
    use generalTrait;
    public function __construct() {
      
      $this->middleware('auth', ['except' =>
         
      [ 'store','showCourses',] 
      
      ]);
    }
    public function index()
    {
        $courses= open_course::latest()->paginate(10);
        return view('open_course.show',compact('courses'));
     
    }

    public function store(Request $request)
    {
        $course_id=$request['course_id'];
        $course=Course::where('id',$course_id)->first();

        if(!$course)
        {
            return $this->returnError("000","please Enter correct id");
        }
        else{

          //validation
          $rules=[
            'course_name'=>'required',
            'course_id'=>'required',
           ];
           $validator=Validator::make($request->all(),$rules);
           if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
              }       
        $course=new open_course();
        $student=Auth::user();
        $course->student_id=Auth::user()->id;
        $course->student_name=$student->profile->student_name;
        $course->course_id=$request['course_id'];
        $course->course_name=$request['course_name'];
        if($student->profile->hours >= "50"){
          $course->student_state="1";
        }else{
          $course->student_state="0";
        }
       if($course->save()){
         return  $this->returnSuccessMessage("the request is sended successfully");
       }
       
        
    }
  
    }

    public function count()
    {
        $courses= open_course::latest()->paginate(10);
        $a=[0];
        
        foreach($courses as $item)
        {
          $a[]=$item->course_name;
       
        }
       
        $c=count($a);

        for($i=0;$i<$c;$i++)
          {
            $b[$a[$i]]=1;
          }
        for($i=0;$i<$c;$i++){
        if($b[$a[$i]]==1){
         for($j=$i+1;$j<$c;$j++){
        if($a[$i]==$a[$j]){
        
        $b[$a[$i]]=$b[$a[$i]]+1;
        }}}}
        
        return view('open_course.show2',compact('b'));
    
    }

    public function showCourses()
    {
      $student=profile_student::where('id',Auth::user()->id)->first();

      $courses=course::where('course_dep',$student->minor)->orwhere('course_dep',$student->major)->get();

      $regs=registrations::where([
        ['student_id', '=',Auth::user()->id],
        ['grade_num', '!=', 0],
       ])->get();
       
       $c=count($regs);
       $course_id=[0];
       for($j=0;$j<$c;$j++)

       {
         $course_id[]= $regs[$j]['course_id'];
    
      }
     
     $c2=count($courses);
             $course=[];
             for($i=0;$i<$c2;$i++){
                if(!in_array( $courses[$i]['id'], $course_id)){
                $course[]= $courses[$i];
                }
             }
         if($course==null){
            return $this->returnSuccessMessage("the student successed in all courses");
         }
         return $this->returnData("courses",$course,"the student doesn't success in yhis courses");
    } 
 
    

}
