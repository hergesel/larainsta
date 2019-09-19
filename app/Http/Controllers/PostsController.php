<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comments;


class PostsController extends Controller

{


   public function __construct()

   {

       $this->middleware('auth');

   }


   public function index(){

       $posts = Post::all();
       $comments = Comments::all();
       return view('posts.list')->with('posts', $posts)->with('comments', $comments);

   }


   public function create() {

       return view('posts.create');

   }


   public function store(){

       request()->validate([

           'image_path' => ['required', 'image']          

       ]);      

       $post = Post::create([

           'user_id' => auth()->id(),

           'image_path' => request()->file('image_path')->store('posts', 'public'),

           'description' => request('description'),

           'filter' => request('filter'),

           'likes' => 0

       ])->save();


       return redirect('home');

   }

   public function like($id){

    $comments = Comments::all();
    $post_like = Post::findOrFail($id);
    $post_like->likes++;
    $post_like->save();
    $posts = Post::all();
    return view('posts.list')->with('posts', $posts)->with('comments', $comments);

   }

   public function deslike($id){

    $comments = Comments::all();
    $post_like = Post::findOrFail($id);
    if ($post_like->likes>0) {
      $post_like->likes--;
      $post_like->save();
      $posts = Post::all();
      return view('posts.list')->with('posts', $posts)->with('comments', $comments);
    }else{
      $posts = Post::all();
      return view('posts.list')->with('posts', $posts)->with('comments', $comments);
    }
    

   }

}