<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware("auth");
    }
    public function index()
    {

       $course= Course::latest()->paginate(10);
       return view('course.index',compact('course'));
    }


    public function create()
    {
       return view('course.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'hours'=>'required',
            'course_name'=>'required',
            'description'=>'required',
            'instractor_name'=>'required',
            'course_dep'=>'required',
            'course_type'=>'required',
            'course_require'=>'required',

        ]);
        $course= Course::create($request->all());
         Alert::success('course created successfuly','Course-ID =' .$request['id'] );
        return redirect()->route('course.index')
        ->with('success','course added successfuly');
    }


    public function show(Course $course)
    {
          return view('course.show',compact('course'));
    }

    public function edit(Course $course)

    {
       return view('course.edit',compact('course'));
    }


    public function update(Request $request, Course $course)
    {
        $request->validate([
            'id'=>'required',
            'course_name'=>'required',
            'description'=>'required',
            'instractor_name'=>'required',
            'course_dep'=>'required',
        ]);

        $course->update($request->all());
        Alert::success('course Updated successfuly','Course-ID =' .$request['id'] );
        return redirect()->route('course.index')
        ->with('success','course updated successfuly');
    }


    public function destroy(Course $course)
    {
        $course->delete();
        Alert::success('course deleted successfuly','Course-ID =' .$course->id );
        return redirect()->route('course.index')
        ->with('success','course deleted successfuly');
    }
}

