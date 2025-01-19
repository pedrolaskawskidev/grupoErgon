<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::with('owner')->first();
        // dd($posts);
        return view('dashboard1',['post' => $posts]);
    }
}
