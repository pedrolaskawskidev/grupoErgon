<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function vote()
    {
        return $this->hasOne(PostVote::class, 'post_id', 'id');
    }

    public function followers()
    {
        return $this->hasMany(PostFollow::class, 'post_id', 'id');
    }
   
    public function isFollowedBy($userId)
    {
        return $this->followers()->where('follower_id', $userId)->exists();
    }
}
