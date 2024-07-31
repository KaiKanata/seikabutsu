<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable =
    [
        'name',
        'count'
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function getByTag(int $limit_count = 5)
    {
        return $this->posts()->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}
