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
<form action="{{ route('course.store')}}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">COURSE_ID</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="id">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_NAME</label>
    <input type="text" class="form-control" name="course_name">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">COURSE_DEP</label>
    <input type="text" class="form-control" name="course_dep">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">description</label>
    <input type="text" class="form-control" name="description">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Hours</label>
    <input type="text" class="form-control" name="hours">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">instractor name</label>
    <input type="text" class="form-control" name="instractor_name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Course-Require</label>
    <input type="text" class="form-control" name="course_require">
  </div>

  <div class="mb-3">
   <input type="radio" id="choose_free" name="course_type" value="choose_free">
  <label for="html">اختيار حر</label><br>
  <input type="radio" id="univ_require" name="course_type" value="univ_require">
  <label for="css">متطلب جامعة</label><br>
  <input type="radio" id="fac_require" name="course_type" value="fac_require">
  <label for="javascript">متطلب كلية</label>
  </div>
  <button type="submit" class="btn btn-primary">create</button>
</form>
</div>









@endsection
