@extends('layout')

@section('content')

<div class="jumbotron container">
  <h1 class="display-4">STUDENTS</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
 
  <a class="btn btn-primary btn-lg" href="{{ route('user.create')}}" role="button">create</a>

 </div>
<div class ="container" >
<table  class="table " padding=10px container style="backgroud-color=transparent">
  <thead>
    <tr>

      <th scope="col">ID</th>
      <th scope="col">PASSWORD</th>
      <th scope="col">FUNCTIONS</th>
      

    </tr>
  </thead>
  <tbody>
    @foreach($user as $item)
    <tr>      
      <td>{{$item->id }}</td>
      <td>{{$item->password }}</td>

      <td>
      <div class="row">
         <div class="col">
         <a  class="btn btn-danger" href ="{{route('user.edit',$item->id)}}">edit</a>

         </div>
         <div class="col">
         <a  class="btn btn-success" href ="{{route('user.show',$item->id)}}">Show</a>

         </div>
         <div class="col">
         <form action="{{ route('user.destroy',$item->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-light">DELETE</button>
          
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