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
                                       
                                        
                                        <th scope="col">Student_ID</th>
	                                    <th scope="col">Grade</th>                                   
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                     
                                        <th scope="col">Student_ID</th>
	                                    <th scope="col">Grade</th>                                             
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($regs as $item)
                                    <tr> 
                                    <td>{{$item->student_id }}</td>
                                     <td>{{$item->grade }}</td>
                                    
                                     <td>
                                     <div class="row">
                                      <div class="col">
                                        
                                      <form action="{{ route('addgrade.store',$item->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">update</button>
                                       
                                       </form>
                                        </div>
                                        </div>
                                     </td>
                                    
                                     
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 @endsection