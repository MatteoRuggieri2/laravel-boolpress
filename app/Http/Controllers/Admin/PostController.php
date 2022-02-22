<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        // Validation
        $request->validate($this->dataValidation());

        $new_post = new Post();
        $new_post->fill($form_data);

        // Creo uno slug univoco
        $new_post->slug = $this->getUniqueSlugFromTitle($new_post->title);

        $new_post->save();

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataValidation()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000'
        ];
    }

    // Questa funzione crea uno slug univoco prendendo come 
    // argomento il "title" passatogli negli argomenti.
    protected function getUniqueSlugFromTitle($title) {

        // Creo lo slug
        $slug = Str::slug($title, '-');
        $slug_base = $slug;

        // Controllo se esiste un post con questo slug
        $post_found = Post::where('slug', '=', $slug_base)->first();

        /* CREAZIONE DI UNO SLUG UNIVOCO
            - Se esiste già, metto "-1" alla fine della stringa.
            - Poi controllo se esiste lo slug modificato.
            - Se esiste lo slug modificato aumento il numero di 1 finchè 
              non sarà uno slug univoco.
        */
        $counter = 0;
        while($post_found) {

            // Aumento il counter
            $counter += 1;

            // Modifico lo slug
            $slug = $slug_base . "-" . $counter;

            // Cerco se esiste lo slug modificato
            $post_found = Post::where('slug', '=', $slug)->first();
        }

        return $slug;
    }
}
