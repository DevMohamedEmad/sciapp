@extends('layout_admin')
@section('content')
       
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">طلبات فتح المواد</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">الطلاب</li>
                        </ol>
                      
                           
                           
                        </div>
                        <div class="row">
   
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                عدد الطلاب لكل مادة
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>                                       
	                                    <th scope="col">COURSE_NAME</th>
                                        <th scope="col">count</th>                                                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                     
	                                    <th scope="col">COURSE_NAME</th>
                                        <th scope="col">count</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                  
                                    @foreach($b as $item)
                                    <tr>      
                                    <td>{{key($b)}}</td>
                                     <td>{{$item }}</td>
                                     {{$ignore = next($b);}}
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               @endsection('content')