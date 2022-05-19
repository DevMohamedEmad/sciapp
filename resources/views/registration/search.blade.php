@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                      
                            <div class="col-xl-3 col-md-6">
                                <div style="backgroud-color=transparent"  >
                                    <div class="card-body">
                                      <form action="{{route('registration.findstudent')}}" method="POST">
                                       @csrf
                                       <input STYLE=" background-color:transparent" type="text"  placeholder="Enter the Student-ID " name="student_id" required>
                                       <button  style="height:100px;width:70px" type="submit" class="btn btn-transparent" >Search</button>        
                                      </form>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                            <div style="backgroud-color=transparent"  >
                                    <div class="card-body">
                                      <form action="{{route('registration.findcourse')}}" method="POST">
                                       @csrf
                                       <input STYLE=" background-color:transparent" type="text"  placeholder="Enter the Course-ID " name="course_id" required>
                                       <button  style="height:50px;width:70px" type="submit" class="btn btn-transparent" >Search</button>        
                                      </form>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                               
                        </div>
                        
               @endsection('content')