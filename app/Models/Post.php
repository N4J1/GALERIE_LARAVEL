<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id'
    ];

    // filter posts
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%');
        }
    }
    // user-post relation
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // post-comment relation
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
