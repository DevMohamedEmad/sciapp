@extends('layoutt')

@section('content')
	<body class="img js-fullheight" style="background-image: url({{asset('log_images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">courses</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	       <form action="{{route('open_course.store')}}" method="POST">
					      @csrf
		      		     <div class="form-group">
		      			   <input type="text" class="form-control" placeholder="course_id" name="course_id" required>
		      		     </div>

						 <div class="form-group">
		      			   <input type="text" class="form-control" placeholder="course_name" name="course_name" required>
		      		     </div>

	                     <div class="form-group">
						      <div class="form-check">
                                 <input class="form-check-input" type="checkbox" name="student_state" value="1" id="flexCheckIndeterminate">
                                 <label class="form-check-label" for="flexCheckIndeterminate">
                                   GRADUATION SEMESTER
                                 </label>
                               </div>
	                     </div>
	                     <div class="form-group">
	            	       <button type="submit" class="form-control btn btn-primary submit px-3">send</button>
	                     </div>
						 <div class="form-group">
						
						 <a  class="form-control btn btn-primary submit px-3" href ="{{route('profile')}}">الصفحة الرئيسية</a>
	                     </div>
		            </div>
				</div>
			</div>
</div>

@endsection('content')