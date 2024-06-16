<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return view('posts.show', ['post' => $post]);
    }
}
