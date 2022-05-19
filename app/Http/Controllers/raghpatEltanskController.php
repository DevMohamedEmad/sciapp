<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Course;
use App\Models\departments;
use App\Traits\generalTrait;
use Illuminate\Http\Request;
use App\Models\registrations;
use App\Models\raghpatEltansk;
use App\Models\profile_student;
use Illuminate\Support\Facades\DB;

class raghpatEltanskController extends Controller
{
    use generalTrait;
    public function store(Request $request)
    {
        $student=profile_student::where('id',Auth::user()->id)->first();
        $regs=registrations::where([
            ['student_id', '=',Auth::user()->id],
            ['grade_num', '!=', 0],
        ])->select('course_id')->get();
         $c=count($regs);
        $success_hours=0;
        for($j=0;$j<$c;$j++){
            $courses=Course::where([['id',$regs[$j]['course_id']],['course_type','fac_require']])->select('hours')->first();
            $success_hours= $courses['hours']+ $success_hours;
        }
        if($student->hours<="34" || $success_hours<9)
        {
           return $this->returnSuccessMessage("this student can't change the Department");
        }
       else
        {
            $array=$request->raghpat;
            $c=count($array);
            for($j=0;$j<$c;$j++){
                $raghpat= new raghpatEltansk();
                $raghpat->student_id= $student->id;
                $dep=departments::where('dep_name',$array[$j])->first();
                $raghpat->department_id=$dep['id'];
                $raghpat->sorting=$j+1;
                $raghpat->save();
            }
        }

    }

    public function depCounter()
    {
          $departments=['cs','stat','phy','chem','fish','math','bio'];
          return View('raghpatEltansek.depCounter',compact('departments'));
    }

    public function storeCounter(Request $request,$item)
    {
        $dep= departments::where('dep_name',$item);
        $updated_tada = array("dep_name"=>$item, "counter"=>$request['counter']);
        $dep->update( $updated_tada);
        return redirect()->back();
    }

    public function Admin()
    {
        $students = profile_student::
                       orderBy('cgpa','DESC')
                       ->get();

       $c=count($students);
       for($j=0;$j<$c;$j++)
       {
        $reghpat[]=raghpatEltansk::where([
            ['student_id', '=',$students[$j]['id']],
        ])->get();
        $this->changeMajor($students[$j]['id'], $reghpat[$j]);
        }
   }

     public function changeMajor($student_id,$raghpat)
     {
        $student=profile_student::where('id',$student_id)->first();
        $c=count($raghpat);
        for($j=0;$j<$c;$j++)
        {

            $dep=departments::where('id',$raghpat[$j]['department_id'])->first();
            if($dep['counter']>=1){
                $dep->counter=  $dep->counter-1;
                $dep->save();
                $student->major=$dep['dep_name'];
                $student->save();
                break;
            }

        }



     }










}
