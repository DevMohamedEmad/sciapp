@extends('layout')

@section('content')
<div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">COURSE_ID : {{$course->id}}</label>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_NAME : {{$course->course_name}}</label>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_DEP : {{$course->course_dep}}</label>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description : {{$course->course_description}}</label>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">instractor name : {{$course->instractor_name}}</label>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_type : {{$course->course_type}}</label>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_Require : {{$course->course_require}}</label>
  </div>
  <div class="mb-3">
    <a href ="{{route('course.index') }}"  class="btn btn-primary">courses</a>
  </div>

</div>
@endsection
