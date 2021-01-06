<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function showPost($post_id)
    {
        $post=Post::where("post_id",$post_id)->get();

        return view("post.individual",["code"=>0,"post"=>$post]);
    }

    public function showNew()
    {
        return view("post.new",["code"=>0]);
    }

    public function new(Request $request)
    {
        if (empty($request->title) || empty($request->content))
        {
            return view("post.new",["code"=>400]);
        }

        $post=new Post;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->user_id=Auth::user()->user_id;

        $post->save();

        return view("post.new",["code"=>200]);
    }

    public function update(Post $post,Request $request)
    {
        if (empty($request->title) || empty($request->content))
        {
            return view("post.individual",["code"=>400,"post"=>[$post]]);
        }

        $post->title=$request->title;
        $post->content=$request->content;

        $post->save();

        return view("post.individual",["code"=>200,"post"=>[$post]]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect("/");
    }
}
