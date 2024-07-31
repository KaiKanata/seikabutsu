<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
    
    public function likes(){
        return $this->belongsToMany('App\Models\Post','likes','user_id','post_id')->withTimestamps();
    }
    //この投稿に対してすでにいいねしたかどうかを判別する。
    public function isLike($postId):bool
    {
        return $this->likes()->where('post_id',$postId)->exists();
    }
    //isLikeを使って、すでにlikeしたか確認した後、いいねする（重複させない）
    public function like($postId)
    {
        if($this->isLike($postId)){
            //すでにいいにしていたら何もしない。
            }else{
            $this->likes()->attach($postId);
            }
    }
    //islikeを使って、すでにいいねしたか確認して、していたら解除する。
    public function unlike($postId)
    {
        if($this->isLike($postId)){
            $this->likes()->detach($postId);
        }else{
        }
    }
}