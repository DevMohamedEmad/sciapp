@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registration</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> courses</li>
                        </ol>
                        <ol class="breadcrumb mb-4">
                          
                        </ol>
                      
                           
                           
                        </div>
                        <div class="row">
                        <ol class="breadcrumb mb-4">
                            <li> </li>
                        </ol>
   
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                courses
                               
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                       
                                        
                                        <th scope="col">COURSE_ID</th>
	                                    <th scope="col">COURSE_NAME</th>     
                                        <th scope="col">Grade</th>                                    
                                        <th scope="col">Semester</th>  
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                     
                                     
                                        <th scope="col">COURSE_ID</th>
	                                    <th scope="col">COURSE_NAME</th> 
                                        <th scope="col">Grade</th>                                   
                                        <th scope="col">Semester</th>                        
                                        
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($array as $item)
                                    <tr> 
                                    <td>{{$item['course_id'] }}</td>
                                     <td>{{$item['course_name'] }}</td>
                                     <td>{{$item['grade'] }}</td>
                                     <td>{{$item['semester']}}</td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 @endsection