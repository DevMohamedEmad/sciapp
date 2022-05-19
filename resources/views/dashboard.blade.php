@extends('layoutt')
@extends('layout')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
       <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
<main>
  <div  class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-transparent"  style="width: 280px;" style="backgroud-color=transparent" >
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">ADMIN</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
       
      <li>
        <a href="{{ route('user.index')}}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Students
        </a>
      </li>

      <li>
        <a href="{{ route('course.index')}}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          courses
        </a>
      </li>

      <li>
        <a href="{{ route('profile')}}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          profiles
        </a>
      </li>
      
      <li>
         <a href="#" class="nav-link text-white">
             <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
             Registration
         </a>
      </li>

      <li>
         <a href="#" class="nav-link text-white">
             <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
            Add-Grades
         </a>
      </li>

      <li>
         <a href="#" class="nav-link text-white">
             <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
             Help
         </a>
      </li>


      <li>
        <a href="{{route('open_course.index')}}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
           open-courses
        </a>
      </li>
      <li>
        <br>
      </li>  
      <li class ="container">
      <div class="col">
         <a  class="btn btn-secondary" href ="{{route('logout')}}">logout</a>

         </div>
         
      </li>
    
    </ul>
    <hr>
  </body>
</html>
