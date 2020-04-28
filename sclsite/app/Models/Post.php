<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
