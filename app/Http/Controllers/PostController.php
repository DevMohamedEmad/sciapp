<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use App\Traits\generalTrait;
use Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class PostController extends Controller
{
   use generalTrait;

   public function __construct(){


    $this->middleware('auth', ['except' =>

    [ 'index']

    ]);

}

    public function index()
    {
        $post=Post::get();
        return $this->returnData("post",$post,"success the all posts");
    }


    public function showposts()
    {
        $posts=Post::all();
        return view('posts.show',compact('posts'));
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'photo'=>'required',
            'content'=>'required',
        ]);

        $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/post/photos',$newPhoto);
        $post=Post::create([
            'title'=>$request->title,
            'user_id'=>Auth::id(),
            'content'=>$request->content,
            'photo'=>'uploads/post/photos/'.$newPhoto,
            'slug'=>Str::slug($request->title),
        ]);
        if($post)
        {
            Alert::success('post added successfully');
            return view('admin.dashboard');
        }
    }
    public function showPost($id)
    {
        $post=Post::where('id',$id)->first();
        return view('posts.showdetails',compact('post'));
    }


    public function edit( $id)
    {
        $post=Post::find($id);
        return view('posts.edit',compact('post'));
    }


    public function update(Request $request,$id)
    {
        $post=Post::find($id);

        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
        ]);

        if($request->has('photo')){
            $photo=$request->photo;
            $newPhoto=time().$photo->getClientOriginalName();
            $photo->move('uploads/post/photos',$newPhoto);
            $post->photo='uploads/post/photos/'.$newPhoto;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        if($post->save())
        {
            Alert::success('post updated successfully');
            return redirect()->back();

        }

    }


    public function destroy( $id)
    {

        $post=Post::find($id);

        if($post->delete())
        {
            Alert::success('post deleted successfully');

            return redirect()->back();

        }

    }

    public function hdelete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
       $post=Post::withTrashed()->where('id',$id)->first();
       $post->restore();
       return redirect()->back();

    }

    public function onlyTrashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('posts.trashed',compact('posts'));
    }

    public function mainPage()
    {
        return view('admin.dashboard');
    }
}
