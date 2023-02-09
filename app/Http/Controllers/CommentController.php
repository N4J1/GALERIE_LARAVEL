<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // create comment
    public function create(Request $request)
    {
        $data = $request->validate([
            'content' => 'required|min:1|max:255'
        ]);

        $data['user_id'] = auth()->id();
        $data['post_id'] = $request['id'];

        Comment::create($data);

        return redirect('/posts/' . $request['id'])->with('message', 'Le commentaire a été créé avec succès !');
    }
}
