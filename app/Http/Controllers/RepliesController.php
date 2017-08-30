<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function userReply(Request $request) {
    	$newReply = new Reply();

    	$newReply->user_id = auth()->user()->id;
    	$newReply->comment_id = $request['comment_id'];
    	$newReply->reply = $request['reply'];

    	$newReply->save();

    	return redirect('/read/' . $request['post_id'])->with('info', "Reply submitted successfully.");
    }
}
