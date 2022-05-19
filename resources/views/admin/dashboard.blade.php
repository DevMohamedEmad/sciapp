@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                     </div>

                     <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="jumbotron">
                                <h1 class="display-4"> Create Post</h1>
                                <a class="btn btn-success" href="{{route('showPosts')}}"> all posts</a>
                                <a class="btn btn-success" href="{{route('onlyTrashedPost')}}">Trashed<i class="fa-solid fa-trash-arrow-up"></i></a>
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
                          <form action="{{route('storePost')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Title  </label>
                                  <input type="text" name="title" style="height:50px;width:170px" class="form-control"   >
                                </div>

                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">content  </label>
                                  <textarea class="form-control" style="height:150px;width:270px" name="content"   rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Photo  </label>
                                    <input type="file"  style="height:50px;width:250px" name="photo" class="form-control"   >
                                  </div>

                                <div class="form-group">

                                    <button class="btn btn-danger" type="submit">save</button>
                                </div>

                              </form>
                          </div>
                        </div>
                      </div>
            </div>
               @endsection('content')
