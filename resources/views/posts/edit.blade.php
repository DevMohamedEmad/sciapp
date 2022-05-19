@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>

                     <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="jumbotron">
                                <h1 class="display-4"> Update-Post</h1>
                                <a class="btn btn-success" href="{{route('showPosts')}}"> all posts</a>
                                <a class="btn btn-danger" href="{{route('mainPage')}}">Home</a>
                               </div>
                          </div>

                        </div>
                        <div class="row">

                            @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>
                                        {{$item}}
                                    </li>
                                @endforeach
                            </ul>
                            @endif


                          <div class="col">
                          <form action="{{route('updatePost',$post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Title  </label>
                                  <input type="text" name="title" value="{{$post->title}}" style="height:50px;width:170px" class="form-control"   >
                                </div>

                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">content  </label>
                                  <textarea class="form-control"  style="height:150px;width:270px" name="content"   rows="3">{{$post->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Photo  </label>
                                    <input type="file"  style="height:50px;width:250px" name="photo" class="form-control"   >
                                  </div>

                                <div class="form-group">

                                    <button class="btn btn-danger" type="submit">Update</button>
                                </div>

                              </form>
                          </div>
                        </div>
                      </div>
            </div>
               @endsection('content')
