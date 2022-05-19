@extends('layout_admin')
@section('content')
            <div id="layoutSidenav_content">
                <main>

                     <div class="container">
                        <div class="row">
                          <div class="col">
                            <div class="jumbotron">
                                <h1 class="display-4">POST</h1>
                                <a class="btn btn-success" href="{{route('showPosts')}}"> all posts</a>
                                <a class="btn btn-danger" href="{{route('mainPage')}}">Home</a>
                               </div>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="card" style="width: 40rem;">
                                <img src="{{URL::asset($post->photo)}}" alt="error"class="card-img-top">
                                <div class="card-body">
                                  <h5 class="card-title">{{$post->title}}</h5>
                                  <p class="card-text">{{$post->content}}</p>
                                  <p> Created_at:{{$post->created_at->diffForhumans()}} </p>
                                  <p> Updated-at:{{$post->updated_at->diffForhumans()}} </p>
                                  <a href="{{route('mainPage')}}" class="btn btn-primary">Home</a>
                                </div>
                              </div>


                          </div>
                        </div>
                      </div>
            </div>
               @endsection('content')
