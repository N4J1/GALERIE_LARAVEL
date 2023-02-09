<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show posts
    public function index(Request $request)
    {
        // dd($request->column);
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search']))->paginate(2)
        ]);
    }
    // show one post
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    // create post view
    public function create()
    {
        return view('posts.create');
    }
    // edit post view
    public function edit(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            abort(403, 'Action non autorisée');
        }

        return view('posts.edit', [
            'post' => $post
        ]);
    }
    // update post
    public function update(Request $request, Post $post)
    {
        if ($post->user_id != auth()->id()) {
            abort(403, 'Action non autorisée');
        }
        $data = $request->validate([
            'title' => 'min:1',
            'content' => 'min:1',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = '/storage/' . $request->file('image')->store('posts', 'public');
        }
        $post->update($data);
        return back()->with('message', 'Le poste a été modifié avec succès !');
    }
    // create post logic
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:1',
            'content' => 'required|min:1',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('image')->store('posts', 'public');
        $data['user_id'] = auth()->id();
        $data['image'] = '/storage/' . $file;
        Post::create($data);
        return redirect('/')->with('message', 'Le poste a été créé avec succès !');
    }

    public function delete(Post $post)
    {
        if ($post->user_id != auth()->id()) {
            abort(403, 'Action non autorisée');
        }

        $post->delete();
        return redirect('/')->with('message', 'Le poste a été supprimée avec succès !');
    }
}
