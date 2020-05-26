<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    protected $fillable = [
        'tag_id', 'title', 'text_content',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')
            ->orderBy('created_at', 'desc');
    }

    public function votes(){
        return $this->hasMany(Vote::class, 'post_id');
    }
    
    public function isLiked(){
        return $this->votes()->where('user_id', Auth::user()['id'])->first() == null;
    }
}
