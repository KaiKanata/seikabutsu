<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongTo(User::class);
    }
    
    public function posts(){
        return $this->belongTo(Post::class);
    }
    
     public function getByLike(int $limit_count = 10)
    {
        return $this->posts()->with('like')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}
