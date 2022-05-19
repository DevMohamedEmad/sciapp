<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\registrations;
use App\Models\profile_student;
use App\Models\Course;
use App\Models\courseregister;
use Illuminate\Http\Request;
use App\Traits\generalTrait;

class RegistrationController extends Controller
{
    use generalTrait;
    public function __construct(){


        $this->middleware('auth', ['except' =>

        [ 'index','registration/counter','create','semester','show','convertSemester']

        ]);

    }

    public function index()
    {
        $student=profile_student::where('id',Auth::user()->id)->first();
        $courseregs=courseregister::where([['course_dep',$student->minor],['semester','summer2010']])->orwhere([['course_dep',$student->major],['semester','summer2010']])->get();
        $regs=registrations::where([
            ['student_id', '=',Auth::user()->id],
            ['grade_num', '!=', 0],
        ])->get();

             $c=count($regs);
             $course_id=[];
             for($j=0;$j<$c;$j++)
             {
               $course_id[]= $regs[$j]['course_id'];

            }
             $c2=count($courseregs);
             $course=[];
             for($i=0;$i<$c2;$i++){
                if(!in_array( $courseregs[$i]['id'], $course_id)){
                $course[]= $courseregs[$i];
                }
             }
         if($course==null){
            return $this->returnSuccessMessage("the student successed in all courses");
         }
         $course_counter=count($course);

         for($j=0;$j<$course_counter;$j++)
        {
            $regcourse=Course::where('id',$course[$j]['id'])->select('course_require')->first();
            if($regcourse['course_require']==0){
                $result[]=$course[$j];
            }
            $regs=registrations::where([
                ['student_id', '=',Auth::user()->id],
                ['grade_num', '!=', 0],
                ['course_id', '=',$regcourse['course_require']],
            ])->first();

            if($regs){
                $result[]=$course[$j];
            }

        }
        return $this->returnData("courses",$result,"success");



    }

    public function create(Request $request)
    {
        $c=count($request->id);

        for($j=0;$j<$c;$j++)
        {
        $id= $request->id[$j];
        $courseregbefore=registrations::where([
            ['course_id', '=',$id],
            ['grade_num', '!=', 0],
        ])->first();

        if($courseregbefore){
           return $this->returnError("DB000","Error in DB");
        }
        $student=profile_student::where('id',Auth::user()->id)->first();
        $course=courseregister::where('id', $id)->first();
        $semester =$course->semester;
        $z=$this->semester($semester);
        $reg=new registrations();
        $reg->id=$student->id.$course->id.$z;
        $reg->student_id=$student->id;
        $reg->course_name=$course->course_name;
        $reg->course_id=$course->id;
        $reg->grade="p";
        $reg->grade_num="0";
        $reg->save();
    }
        return $this->returnSuccessMessage("the course is registered");
    }


    public function show()
    {
        $regs= registrations::where('student_id','=',Auth::user()->id)->get();
        if(sizeof($regs)==0){
            return $this->returnSuccessMessage("No courses to show");
        }
        $c=count($regs);
        for($j=0;$j<$c;$j++)
        {
           $semesterByNum[]=substr($regs[$j]['id'],-5);
           $result[]=$this->convertSemester($semesterByNum[$j]);
           $courses[$result[$j]][]=$regs[$j];
        }
        $c=count($courses);

        for($j=0;$j<$c;$j++)
        {
           $total_hours=0;
          $arr=$courses[$result[$j]];
            $c1=count($arr);
               $gpa=0;
             for($i=0;$i<$c1;$i++){
                $course_hours=Course::where('id','=',$arr[$i]['course_id'])->select("hours")->first();
                $course_hours=$course_hours['hours'];
                if($arr[$i]['grade']!="p"){
                    $total_hours=$course_hours+$total_hours;


                  if($arr[$i]['grade']=="A"){
                      $gpa=($gpa*($total_hours-$course_hours)+($arr[$i]['grade_num']* $course_hours))/$total_hours;
                  }
                  if($arr[$i]['grade']=="F"){
                    $gpa=($gpa*($total_hours-$course_hours)+($arr[$i]['grade_num']* $course_hours))/$total_hours;
                }}
             }
          array_push($courses[$result[$j]],$gpa);
        }
        return $this->returnData("semester",$courses,"success");


    }

    public function delete($id)
    {
        $course=courseregister::where('id',$id);
        $course->delete();
    }

    public function destroy($id)

    {

        $reg=registrations::where('id',$id);
        $reg->delete();
        return redirect()->route('registration.show');

    }

    public function semester($semester)
    {
         if(str_contains($semester, 'autumn'))
         {

            $z=str_replace("autumn","0", $semester );

          }
         elseif(str_contains($semester, 'spring'))
         {

           $z=str_replace("spring","1", $semester );

         }

         else
         {

          $z=str_replace("summer","2", $semester );
         }

     return $z;

    }
    public function convertSemester($semester)
    {

        $letter = array($semester);
        $letter=$semester['0'];

         if($letter=="0")
         {

            $z=substr_replace($semester, 'autumn',0,1);

          }
         elseif($letter=="1")
         {

           $z=substr_replace($semester,"spring",0,1);

         }

         else
         {

            $z=substr_replace($semester,"summer",0,1);

         }

     return $z;

    }

    public function counter()
    {
        $counter=0;
        $regs=registrations::where([
            ['student_id', '=',Auth::user()->id],
            ['grade', '=', 'p'],
        ])->get();

        foreach($regs as $reg)
        {
          $counter=$reg->courseregister->course->hours+$counter;
        }
        return $counter;

    }
    public function search()
    {
        return view('registration.search');

    }

    public function findcourse(Request $request)
    {
        $regs=registrations::where('course_id',$request->course_id)->get();
        $counter=0;
        foreach($regs as $reg)
        {
            $counter=$counter+1;
            $student[]=$reg-> profile_student;
        }

       return view('registration.showstudentresult',compact('student','counter'));

    }


    public function findstudent(Request $request)
    {

        $reg=registrations::where('student_id',$request->student_id)->select('id', 'course_id','course_name','grade')->get();
        $c=count($reg);

        for($j=0;$j<$c;$j++)
        {
           $semesterByNum[]=substr($reg[$j]['id'],-5);
           $result[]=$this->convertSemester($semesterByNum[$j]);
           $array[$j]['course_id']=$reg[$j]['course_id'];
           $array[$j]['course_name']=$reg[$j]['course_name'];
           $array[$j]['grade']=$reg[$j]['grade'];
           $array[$j]['semester']=$result[$j];
        }
        return view('registration.showcourseresult',compact('array'));


    }

}
