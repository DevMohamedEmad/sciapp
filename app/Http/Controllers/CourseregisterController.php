<?php

namespace App\Http\Controllers;

use App\Models\courseregister;
use App\Models\Course;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class CourseregisterController extends Controller
{
    
    public function index()
    {
       
        $course= Course::all();
        return view('courseregister.index',compact('course'));
    }

    public function trashed()
    {
        $course= courseregister::onlyTrashed();
        return view('courseregister.index',compact('course'));
    }

    
    public function create($id)
    {
        $course=Course::where('id',$id)->first();
        return view('courseregister.create')->with('course',$course);
       
        
    }

   
    public function store(Request $request)
    
    {
        $request->validate([
            'semester'=>'required',
            'lecture'=>'required',
            'final'=>'required',
        ]);
        $course= new courseregister();
        $course->create($request->all());
        Alert::success('success', 'course added successfully');
        return redirect('courseregister');
     

    }

   
    public function show()
    {
        $course= courseregister::all();
        return view('courseregister.show',compact('course'));
    }

    
    public function edit($id)
    {
       $course= courseregister::find($id);
       return view('courseregister.edit')->with('course',$course);
    }

    
    public function update(Request $request, $id)
    {
        $course = courseregister::find($id);

        $this->validate($request,[
           
         'lecture'=>'required',
         'semester'=>'required',
         'final'=>'required',

        ]);
        $course->lecture=$request->lecture;
        $course->final=$request->final;
        $course->semester=$request->semester;
        $course->save();
        Alert::success('course updated successfully ', 'Course-ID :'. $course->id);
        return redirect()->route('courseregister.show');
        
    }

    public function destroy($id)
    {
        $course=courseregister::where('id',$id);
        $course->delete();
        return redirect()->route('courseregister.show');
    }

    public function hdelete($id)
    {
        $course=courseregister::withTrashed->where('id',$id)->first();
        $course->forceDelete();
        return redirect()->route('courseregister.index');
    }

    public function restore($id)
    {
        $course=courseregister::withTrashed->where('id',$id)->first();
        $course->restore();
        return redirect()->route('courseregister.show');
    }
   
}
