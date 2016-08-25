<?php
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller{
    public function  getDashbord(){
        $posts=Post::orderby('created_at','desc')->get();
        return view('dashbord',['posts'=>$posts]);
    }
    public function postCreatePost(Request $request){
        $this->validate($request,[
           'body'=> 'required|max:1000'
        ]);
        $post =new Post();
        $post->body = $request['body'];
        $message='There we are error';
        if($request->user()->posts()->save($post)){
            $message="Post successfully created";
        }
        return redirect()->route('dashbord')->with(['message'=> $message]);
    }
    public function getDeletePost($post_id){
        $post=Post::where('id',$post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashbord')->with(['message'=> "Sucesfull delete"]);
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
}