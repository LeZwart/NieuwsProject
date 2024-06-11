<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    function uploadComment(Request $req)
    {
        request()->validate([
            'comment' => 'required',
            'news_id' => 'required'
        ]);

        $comment = new Comment;
        $comment->message = $req->comment;
        $comment->news_id = $req->news_id;
        $comment->reviewer_id = auth()->user()->id;
        $comment->save();
        return redirect()->back();
    }

    function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back();
    }

    function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit', ['comment' => $comment]);
    }

    function update(Request $req, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->message = $req->comment;
        $comment->save();
        return redirect()->route('news.show', ['id' => $comment->news_id]);
    }


}
