<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostFollow;
use App\Models\PostVote;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $posts = Post::where('owner_id', $user_id )->with('vote')->get();

        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Post::create($data);
        return redirect()->route('post.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post =  Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token', '_method');
        
       $post = Post::findOrFail($data['id']);
       $post->update($data);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index');
    }

    public function postVote(Request $request)
    {
        $id_post = $request['id_post'];
        $vote_type = $request['vote_type'];
        $post_owner = $request['owner_id'];

        $post = PostVote::where('post_id', $id_post)->first();

        if (!$post) {
            PostVote::create([
                'post_id' => $id_post,
                'owner_id' => $post_owner,
                'up_vote' => $vote_type === 'up_vote' ? 1 : 0,
                'down_vote' => $vote_type === 'down_vote' ? 1 : 0
            ]);
        } else {
            PostVote::where('post_id', $id_post)->increment($vote_type === 'up_vote' ? 'up_vote' : 'down_vote');
        }

        $post = PostVote::where('post_id', $id_post)->first();

        $this->postFollow($request);

        return response()->json([
            'success' => true,
            'up_vote' => $post->up_vote,
            'down_vote' => $post->down_vote,
        ]);
    }

    public function postFollow(Request $request)
    {
        $post_id = $request['id_post'];
        $owner_post = $request['owner_id'];
        $user_id = $request['user_id'];
    
        $postFollow = PostFollow::where([
            'follower_id' => $user_id,
            'post_id' => $post_id,
            'owner_post_id' => $owner_post,
        ])->first();
    
        if (!$request->has('vote_type')) {
    
            if ($postFollow) {
                PostFollow::where([
                    'follower_id' => $user_id,
                    'post_id' => $post_id,
                    'owner_post_id' => $owner_post,
                ])->delete();
                
                return response()->json([
                    'message' => 'unfollow',
                    'follower_id' => $user_id,
                    'post_id' => $post_id,
                    'owner_post_id' => $owner_post,
                ], 400); 
            } else {

                PostFollow::create([
                    'follower_id' => $user_id,
                    'post_id' => $post_id,
                    'owner_post_id' => $owner_post,
                ]);
                
                return response()->json([
                    'message' => 'follow',
                    'follower_id' => $user_id,
                    'post_id' => $post_id,
                    'owner_post_id' => $owner_post,
                ], 200);
            }
        } else { 
            if ($postFollow) {
                return response()->json([
                    'message' => 'follow',
                    'follower_id' => $user_id,
                    'post_id' => $post_id,
                    'owner_post_id' => $owner_post,
                ], 200);
            } else {
               
                PostFollow::create([
                    'follower_id' => $user_id,
                    'post_id' => $post_id,
                    'owner_post_id' => $owner_post,
                ]);
                
                return response()->json([
                    'message' => 'follow/vote',
                    'follower_id' => $user_id,
                    'post_id' => $post_id,
                    'owner_post_id' => $owner_post,
                ], 200);
            }
        }
    }
    
}
