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
                                courses and students
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th scope="col">COURSE_ID</th>
	                                    <th scope="col">COURSE_NAME</th>
                                        <th scope="col">COURSE_Dep</th>
                                        <th scope="col">Final</th>
                                        <th scope="col">lecture</th>
                                        <th scope="col">semester</th>
                                        <th scope="col">FUNCTIONS</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">COURSE_ID</th>
	                                    <th scope="col">COURSE_NAME</th>
                                        <th scope="col">COURSE_dep</th>
                                        <th scope="col">final</th>
                                        <th scope="col">LECTURE</th>
                                        <th scope="col">semester</th>
                                        <th scope="col">FUNCTIONS</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($course as $item)
                                    <tr>

                                    <td>{{$item->id}}</td>
                                     <td>{{$item->course_name }}</td>
                                     <td>{{$item->course_dep }}</td>
                                     <td>{{$item->final }}</td>
                                     <td>{{$item->lecture }}</td>
                                     <td>{{$item->semester }}</td>


                                     <td>
                                       <div class="row">
                                      <div class="col">

                                      <form action="{{ route('courseregister.edit',$item->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary">Update</button>
                                       </form>
                                        </div>
                                        </div>
                                       </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 @endsection
