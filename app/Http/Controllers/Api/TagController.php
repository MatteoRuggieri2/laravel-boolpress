<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();

        foreach($tags as $tag) {
            $tag->related_posts_number = $tag->posts->count();
        }

        $response = [
            'success' => true,
            'results' => $tags
        ];

        return response()->json($response);
    }
    
    public function show($slug) {
        $tag = Tag::where('slug', '=', $slug)->with('posts')->first();
        
        if($tag) {

            $response = [
                'success' => true,
                'results' => $tag
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
