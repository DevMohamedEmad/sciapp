
@extends('layout')

@section('content')

<div class="jumbotron container">
  <h1 class="display-4">COURSES</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">

  <a class="btn btn-primary btn-lg" href="{{ route('course.create')}}" role="button">create</a>

 </div>
<div class ="container" >
<table  class="table table-dark table-striped" padding=10px container>
  <thead>
    <tr>

      <th scope="col">COURSE_ID</th>
      <th scope="col">COURSE_NAME</th>
      <th scope="col">COURSE_Require</th>
      <th scope="col">COURSE_TYPE</th>
      <th scope="col">COURSE_DEP</th>
      <th scope="col">INSTRACTOR_NAME</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">FUNCTIONS</th>


    </tr>
  </thead>
  <tbody>
    @foreach($course as $item)
    <tr>
      <td>{{$item->id }}</td>
      <td>{{$item->course_name }}</td>
      <td>{{$item->course_dep }}</td>
      <td>{{$item->course_type }}</td>
      <td>{{$item->course_require }}</td>
      <td>{{$item->instractor_name }}</td>
      <td>{{$item->description }}</td>
      <td>
      <div class="row">
         <div class="col">

          <a class="btn btn-danger" href ="{{route('course.edit',$item->id)}}">edit</a>
          <a class="btn btn-success" href ="{{route('course.show',$item->id)}}">Show</a>
          <form action="{{ route('course.destroy',$item->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-light">DELETE</button>
          </form>
         </div>
         <div class="col">

         </div>
         <div class="col">


         </form>
         </div>
      </div>

       </td>
    </tr>

    @endforeach
  </tbody>



  </table>
</div>





















@endsection('content')
