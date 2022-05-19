<!DOCTYPE html>
<html>
<head>
<title>faculty of science</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('log_css/style.css')}}">
</head>
<body>
@yield('content')



  <script src="{{asset('log_js/jquery.min.js')}}"></script>
  <script src="{{asset('log_js/popper.js')}}"></script>
  <script src="{{asset('log_js/bootstrap.min.js')}}"></script>
  <script src="{{asset('log_js/main.js')}}"></script>
  @include('sweetalert::alert')

</body>
</html>
