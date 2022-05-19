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
                                courses and students
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th scope="col">count</th>
	                                    <th scope="col">COURSE_NAME</th>
                                        <th scope="col">COURSE_ID</th>
                                        <th scope="col">STUDENT_ID</th>
                                        <th scope="col">student_NAME</th>
                                        <th scope="col">ترم تخرج</th>
                                        <th scope="col">FUNCTIONS</th>                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">count</th>
	                                    <th scope="col">COURSE_NAME</th>
                                        <th scope="col">COURSE_ID</th>
                                        <th scope="col">STUDENT_ID</th>
                                        <th scope="col">student_NAME</th>
                                        <th scope="col">ترم تخرج</th>
                                        <th scope="col">FUNCTIONS</th>                                          
                                        
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($courses as $item)
                                    <tr>      
                                      <td>{{$item->id }}</td>
                                     <td>{{$item->course_name }}</td>
                                     <td>{{$item->course_id }}</td>
                                     <td>{{$item->student_id }}</td>
                                     <td>{{$item->student_name }}</td>
	                                 <td>{{$item->student_state }}</td>
                                     <td>
                                       <div class="row">
                                      <div class="col">
                                      <form action="{{ route('course.destroy',$item->id)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-light">Accept</button>
          
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
               @endsection('content')