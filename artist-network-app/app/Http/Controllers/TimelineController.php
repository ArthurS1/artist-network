<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Get the last x posts
     */

    public function last(Request $request)
    {
        dump($request->all());
    }
}
