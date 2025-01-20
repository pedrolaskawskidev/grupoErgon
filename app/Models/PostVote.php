<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    
    protected $table = 'posts_vote';
    protected $fillable = ['post_id', 'owner_id', 'up_vote', 'down_vote'];

}
