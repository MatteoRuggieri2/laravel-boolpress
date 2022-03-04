<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        
        $posts = Post::paginate(9);

        $response = [
            'success' => true,
            'results' => $posts
        ];

        return response()->json($response);
    }

    public function show($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        
        if ($post) {

            $response = [
                'success' => true,
                'results' => $post
            ];

        } else {

            $response = [
                'success' => false,
                'results' => []
            ];

        }

        return response()->json($response);
    }
}
