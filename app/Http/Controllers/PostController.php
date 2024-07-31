<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\TagPost;
use App\Models\like;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(PostRequest $request, Tag $tag)
    {
        
        $post = new Post();
        
        $input = $request['post'];
        if(empty($input['image_path'])){
        $input['image_path'] = 'default_image.jpg';
        }
        
    
        $tag_name = $request['tag'];
        $tag->name =$tag_name; 
        $tag->save();
        $post->tag_id=$tag->id;
        
        
        $post->fill($input)->save();
        return redirect('/posts/' .$post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        if(empty($input['image_path'])){
        $input_post['image_path'] = 'default_image.jpg';
        }
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/dashboard/');
    }
    
    public function likePost(Request $request,Post $post){
        //認証済みユーザーを取得
        $user = Auth::user();
        if($user){
            //useridの取得
            $user_id = Auth::id();
            //すでにいいねしているかチェック
            $existingLike = Like::where('post_id', $post->id)
                                ->where('user_id',$user_id)
                                ->first();
            //すでにいいねしている場合は何もせず、そうでない場合は新いいねを作成
            if(!$existingLike){
                $like = new Like();
                $like->post_id = $post->id;
                $like->user_id = $user_id;
                $like->save();
            }
            //記事の状態を返す
            return response()->json([
                'post' => [
                    'slug' => $post->slug,
                    'title' => $post->title,
                    'description' => $post->description,
                    'body' => $post->body,
                    'tagList' => $post->tags->pluck('name'),
                    'createdAt' => $post->created_at,
                    'updatedAt' => $post->updated_at,
                    'liked' => true,
                    'likedCount' => $post->likes()->count()
                    ]
                 ]);
        }else{
            return response()->json(['error' => 'Unauthorized'],401);
        }
    }
}
