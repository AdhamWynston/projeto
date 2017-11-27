<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $post = Post::all();
        return response()->json($post);
    }
    public function getData(){
        $post = Post::paginate(10);
        return response()->json($post);
    }
    public function main(){
        return view('posts.index');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);
        $post->save();
        return response()->json([
            'message' => 'Post criado com sucesso!'
        ],201);
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all());
        $post->save;
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json(['message'=>'Removido com sucesso!']);
    }
}