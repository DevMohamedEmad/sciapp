<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('log_css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('log_images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="{{route('postlogin')}}" method="POST">
					  @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="id" name="id" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('log_js/jquery.min.js')}}"></script>
  <script src="{{asset('log_js/popper.js')}}"></script>
  <script src="{{asset('log_js/bootstrap.min.js')}}"></script>
  <script src="{{asset('log_js/main.js')}}"></script>
  
  @include('sweetalert::alert')

	</body>
</html>

