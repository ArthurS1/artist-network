<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class TimelineController extends Controller
{
    /**
     * Get the last x posts
     */

    public function last(Request $request)
    {
        $offset = $request->input('offset');

        $load = Post::all()
            ->sortByDesc('id')
            ->skip($offset)
            ->take(5);
        return $load->toJson();
    }

    /**
     * Add a new post
     */
    public function post(Request $request)
    {
        $user = Auth::user();
        $post = Post::create([
            'title' => $request->input('title'),
            'likes' => 0,
            'views' => 0,
            'user_id' => $user->id,
        ]);
    }
}
