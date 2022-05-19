@extends('layout')

@section('content')
<div class="container" >
@if(count($errors)>0)
                           @foreach($errors ->all() as $item)
                           <li>
                             {{$item}}
                           </li>

                           @endforeach
                           @endif
<form action="{{ route('user.store')}}" method="POST" >
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID</label>
        <input type="text" class="form-control"  aria-describedby="emailHelp" name="id">
      </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
    <input type="password" class="form-control" name="password">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">STUDENT-NAME</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="student_name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">LEVEL</label>
    <input type="text" class="form-control" name="level">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">HOURS</label>
    <input type="text" class="form-control" name="hours">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MAJOR</label>
    <input type="text" class="form-control" name="major">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MINOR</label>
    <input type="text" class="form-control" name="minor">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CGPA</label>
    <input type="text" class="form-control" name="cgpa">
  </div>
  <button type="submit" class="btn btn-primary">create</button>
</form>
</div>
@endsection
