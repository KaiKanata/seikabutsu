<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagConontroller extends Controller
{
    public function showPostByTag($tagId)
    {
        $tag=Tag::findOrFail($tagId);
        $posts = $tag->getByTag();
        
        return view('posts.index',compact('posts'));
    }
}
