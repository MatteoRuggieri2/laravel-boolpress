<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show($slug) {
        $tag = Tag::where('slug', '=', $slug)->with('posts')->first();
        
        if($tag) {

            $response = [
                'sucsess' => true,
                'results' => $tag
            ];

        } else {

            $response = [
                'sucsess' => false,
                'results' => []
            ];

        }

        return response()->json($response);
    }
}
