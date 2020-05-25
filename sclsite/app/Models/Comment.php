<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc');
    }
    
    public function getIsReplyAttribute()
    {
        return $this->commentable_type == Comment::class;
    }
}
