<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //con all mi da collection , mettendo
        //il toArray ci da l'array della collection
        $posts = Post::all();//->toArray;

        $data = [
            'posts'=> $posts
        ];

        return view('admin.post.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags=Tag::all();

        $data = [
            'tags'=> $tags
        ];

        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $idUser = Auth::id();

        $newPost = new Post();
        // $newPost->user_id corrisponde alla colonna
        $newPost->user_id = $idUser;
        $newPost->slug = Str::slug($data['title']);
        //questi dati fanno riferimento al file create.blade.php(cartella post).
        //$newPost->fill($data) si potrebbe scrivere anche cosi:
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $cover_path = Storage::put('post_covers',$data['image']);
        $data['cover']=$cover_path;

        $newPost->cover = $data['cover'];

        $newPost->save();

        // dobbiamo andare a inserire i dati che abbiamo salvato nella
        //tabella ponte:
        //utilizziamo metodo sync e richiamiamo metodo tags :tags()
        //che è riferito a quello presente nel model post.php.
        //inoltre inseriamo un controllo che serve per andare a spuntare
        //la casella check
        if(array_key_exists('tags', $data)){
            $newPost->tags()->sync($data['tags']);
        }
        return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post
        ];
        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)

    {   
        $tags = Tag::all();

        $data = [
        'post' => $post,
        'tags'=> $tags
        ];
        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        //se c'è il controllo del titolo unique posso 
        // anche evitare il controllo dello slug

        //controllo per non far ricalcolare lo slug al database
        if($data['title'] !=$post->title){
            $slug = Str::slug($data['title']);
            $data['slug'] = $slug;
        }

        //controllo dell'immagine
        if(array_key_exists('image', $data)){
            $cover_path = Storage::put('post_covers',$data['image']);
            $data['cover']=$cover_path;
        }

        $post ->update($data);
        //controllo del tag
        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('post.show', $post );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();

        return redirect()->route('post.destroy');
    }
}


