@extends('layout')

@section('content')
<div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID : {{$profile->id}}</label>
    
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">NAME : {{$profile->student_name}}</label>
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MAJOR : {{$profile->major}}</label>
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MINOR : {{$profile->minor}}</label>
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">LEVEL : {{$profile->level}}</label>
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">HOURS : {{$profile->hours}}</label>
  
  </div>
  <div class="mb-3">
    <a href ="{{route('logout') }}"  class="btn btn-primary">LOG OUT</a>
  </div>

</div>