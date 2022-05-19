@extends('layout')

@section('content')
<div class="container">
@if(count($errors)>0)
                           @foreach($errors ->all() as $item)
                           <li> 
                             {{$item}}
                           </li>

                           @endforeach
                           @endif
<form action="{{ route('course.update',$course->id)}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">COURSE_ID : {{$course->id}} </label>
    <input type="text" class="form-control" value="{{$course->id}}"  name="id">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_NAME</label>
    <input type="text" class="form-control" value="{{$course->course_name}}" name="course_name">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_DEP</label>
    <input type="text" class="form-control" value="{{$course->course_dep}}" name="course_dep">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description</label>
    <input type="text" class="form-control" value="{{$course->description}}" name="description">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">instractor name</label>
    <input type="text" class="form-control" value="{{$course->instractor_name}}" name="instractor_name">
  </div>
  <button type="submit" class="btn btn-primary">create</button>
</form>
</div>