<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->paginate(5);
        return view('comments.index', compact('comments', 'post_id'));
    }

    public function create($post_id)
    {
        return view('comments.create', compact('post_id'));
    }

    public function store(Request $request, $post_id)
    {
        $request->validate([
            'author_name' => 'required|max:255',
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->author_name = $request->author_name;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('posts.index', ['post_id' => $post_id]);
    }

    public function show($post_id, $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment', 'post_id'));
    }

    public function edit($post_id, $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment', 'post_id'));
    }

    public function update(Request $request, $post_id, $id)
    {
        $request->validate([
            'author_name' => 'required|max:255',
            'content' => 'required',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('comments.index', ['post_id' => $post_id]);
    }

    public function destroy($postId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect()->route('posts.show', $postId)->with('success', 'Commentaire supprimé avec succès.');
    }

}
