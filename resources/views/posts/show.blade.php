@extends('layout_admin')
@section('content')




            <div id="layoutSidenav_content">
                <main>
                     <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="jumbotron container">
                                <h1 class="display-4">POSTS</h1>
                                <p class="lead">THE ALL POSTS.</p>
                                <a  class ="btn btn-success"href="{{route('mainPage')}}">Back</a>
                                <hr class="my-4">



                               </div>
                          </div>

                        </div>
                        <div class="row">
                            @if ($posts->count()>0)
                            <div class="col">
                                <table class="table">
                                    <thead>
                                      <tr>

                                        <th scope="col">Title</th>
                                        <th scope="col">USER-ID</th>
                                        <th scope="col">photo</th>
                                        <th scope="col">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $item)
                                        <tr>
                                            <td colspan="1"> {{$item->title}}</td>
                                            <td colspan="1"> Admin</td>
                                            <td colspan="1">
                                                <img src="{{URL::asset($item->photo)}}" alt="error" class="img-tumbnail" width="100" height="100">
                                               
                                               </td>
                                               <td colspan="1">
                                                <a  class="text-success" href="{{route('destroyPost',['id'=>$item->id])}}"><i class=" fa-2x fa-solid fa-trash-can"></i></a>&nbsp;
                                                <a  href="{{route('editPost',$item->id)}}"><i class="fa-2x fa-solid fa-pen-to-square"></i></a>&nbsp;
                                                <a class="text-danger" href="{{route('showPost',['id'=>$item->id])}}"><i class="fa-2x fa-solid fa-eye"></i></a>
                                            </td>
                                          </tr>

                                        @endforeach

                                    </tbody>
                                  </table>
                              </div>

                        </div>
                            @else
                            <div class="alert alert-danger" role="alert">
                              no posts to show
                              </div>
                            @endif

                      </div>
            </div>

 @endsection('content')
