<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function userAnswer(Request $request) {
    	$newComment = new Comment();

    	$newComment->article_id = $request['post_id'];
    	$newComment->user_id = auth()->user()->id;
    	$newComment->comment = $request['comment'];

    	$newComment->save();

    	// echo "successfully comment saved...";
    	return redirect('/read/' . $request['post_id'])->with('info', "You have successfully posted an answer for this question.");
    }
}
