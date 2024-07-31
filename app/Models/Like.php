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
}
