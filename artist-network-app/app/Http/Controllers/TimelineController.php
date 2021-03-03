<?php

namespace App\Http\Controllers;

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
}
