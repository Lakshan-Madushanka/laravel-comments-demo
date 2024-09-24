<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, Request $request)
    {
        config(['comments.guest_mode.secured' => true]);

        return view('posts.show', ['post' => $post]);
    }
}
