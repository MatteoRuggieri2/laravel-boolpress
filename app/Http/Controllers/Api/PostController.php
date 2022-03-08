<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        
        $posts = Post::paginate(6);

        // Trasformo il path cover in un url assoluto
        foreach($posts as $post) {
            if($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            }
        }

        $response = [
            'success' => true,
            'results' => $posts
        ];

        return response()->json($response);
    }

    public function show($slug) {
        $post = Post::where('slug', '=', $slug)->with('category', 'tags')->first();

        // Trasformo il path cover in un url assoluto
        if($post->cover) {
            $post->cover = url('storage/' . $post->cover);
        }
        
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
