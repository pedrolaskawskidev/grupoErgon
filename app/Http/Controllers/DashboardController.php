<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostFollow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  
    public function index()
    {
        $posts = Post::with('owner', 'vote', 'followers')->get()
            ->map(function ($post) {
            $post->is_followed_by_auth = $post->isFollowedBy(Auth::id());
            return $post;
        });

        return view('dashboard', ['posts' => $posts]);
    }

    public function follow()
    {
        $user_id = Auth::id();

        $followed_posts = PostFollow::where('follower_id', $user_id)->pluck('post_id');
        $followed_posts = Post::whereIn('id', $followed_posts)->get()
            ->map(function ($post) {
            $post->is_followed_by_auth = $post->isFollowedBy(Auth::id());
            return $post;
            });

        return view('dashboard', ['posts' => $followed_posts]);
    }
}
