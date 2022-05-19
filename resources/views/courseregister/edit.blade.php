@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add course to register</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">{{$course->course_name}}</li>
                        </ol>
                    </div>
                        
                         <div class="row">                         
                         @if(count($errors)>0)
                           @foreach($errors ->all() as $item)
                           <li> 
                             {{$item}}
                           </li>

                           @endforeach
                           @endif
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                {{$course->course_name}}
                            </div>
                            <div class="card-body">
                               <form action="{{ route('courseregister.update',$course->id)}}" method="POST">
                                  @csrf
                                
                               <div class="mb-3">
                                
                                 <input type="hidden" class="form-control"  aria-describedby="emailHelp" name="id" value="{{$course->id}}">
                               </div>

                               <div class="mb-3">
                                
                                 <input type="hidden" class="form-control"  aria-describedby="emailHelp" name="course_name" value="{{$course->course_name}}">
                               </div>

                               <div class="mb-3">
                                 <input type="hidden" class="form-control"  aria-describedby="emailHelp" name="course_dep" value="{{$course->course_dep}}">
                               </div>

                               <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">LECTURE</label>
                                 <input type="date" class="form-control"  aria-describedby="emailHelp" name="lecture" value="{{$course->course_dep}}">
                               </div>

                               <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">FINAL</label>
                                 <input type="date" class="form-control"  aria-describedby="emailHelp" name="final" value="{{$course->course_dep}}">
                               </div>

                               <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">SEMESTER</label>
                                 <input type="text" class="form-control"  aria-describedby="emailHelp" name="semester" value="{{$course->course_dep}}">
                               </div>
                              
                               <button type="submit" class="btn btn-secondray">Update</button>
                               </form>
                            </div>
                    </div>
               @endsection('content')