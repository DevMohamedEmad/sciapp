@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registration</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Choose the courses</li>
                        </ol>                           
                        </div>
                        <div class="row">
   
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                courses 
                                <i class="fas fa-table me-1"></i>
                                <button type="submit" class="btn btn-secondary">{{$counter}}</button>
          
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th scope="col">Student_ID</th>
	                                    <th scope="col">Student_NAME</th>
                                     
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">COURSE_ID</th>
	                                    <th scope="col">COURSE_NAME</th>                              
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    @foreach($student as $item)    
                                    <tr>     
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->student_name }}</td>
                                    @endforeach
                                    </tr>
                                    
                                    

                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection