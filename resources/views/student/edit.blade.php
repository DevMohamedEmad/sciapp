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
<form action="{{ route('user.update',$user->id)}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID :  </label>
    <input type="text" class="form-control" name="id">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">PASSWORD</label>
    <input type="password" class="form-control"  name="password">
  </div>
  <button type="submit" class="btn btn-primary">SAVE</button>
</form>
</div>