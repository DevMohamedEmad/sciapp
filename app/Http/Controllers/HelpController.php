<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Traits\generalTrait;
use Auth;
use App\Models\Profile_student;
class HelpController extends Controller
{
    use generalTrait;

    public function InformationAboutCourse(Request $request)
    {
     $course_id=$request->course_id;
     $course=Course::where('id', $course_id)->first();
     return $this->returnData("course",$course,"this is data about the course");
    }


/*public function ChangeDepartment(Request $request)
{
    $student=profile_student::where('id',Auth::user()->id)->first();
    $department=$request->department;
    return $course_id[0];

}*/

/*public function ChangeDepartmentAdmin(Request $request)
{
    $student=profile_student::where('id',Auth::user()->id)->first();
    $department=$request->department;
    return $course_id[0];
}*/


}
