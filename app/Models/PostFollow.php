<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostFollow extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;

    protected $table = 'posts_followers'; 
    protected $fillable = ['follower_id', 'post_id', 'owner_post_id'];
}
