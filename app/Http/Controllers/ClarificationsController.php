<?php

namespace App\Http\Controllers;

use App\Clarification;
use Illuminate\Http\Request;

class ClarificationsController extends Controller
{
    public function saveClarification(Request $request) {
    	$newClarification = new Clarification();

    	$newClarification->user_id = auth()->user()->id;
    	$newClarification->article_id = $request['post_id'];
    	$newClarification->clarification = $request['clarification'];

    	$newClarification->save();

    	return redirect('/read/' . $request['post_id'])->with('info', 'Your doubt has been submitted');
    }
}
