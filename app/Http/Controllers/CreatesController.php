<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class CreatesController extends Controller
{
    public function home() {
    	$articles = Article::all();
    	return view('home', compact('articles'));
    }

    public function insert(Request $request) {
    	$this->validate($request, [
    		'title' => 'required',
    		'description' => 'required'
    	]);

    	$newArticle = new Article();

        $newArticle->user_id = auth()->user()->id;
    	$newArticle->title = $request['title'];
    	$newArticle->description = $request['description'];

    	$newArticle->save();

    	return redirect('/home')->with('info', 'Post created successfully...');
    }

    public function update($id) {
    	$article = Article::find($id);

    	return view('update', compact('article'));
    }

    public function edit(Request $request, $id) {
    	$this->validate($request, [
    		'title' => 'required',
    		'description' => 'required'
    	]);

    	Article::where('id', $id)->update([
    		'title' => $request['title'],
    		'description' => $request['description']
    	]);

    	return redirect('/home')->with('info', 'Post updated successfully...');
    }

 	public function read($id) {
    	$article = Article::find($id);
    	return view('read', compact('article'));
    }

    public function delete($id) {
    	$article = Article::find($id);
    	return view('delete', compact('article'));
    }

    public function deleteconfirm($id) {
    	Article::where('id', $id)->delete();
    	return redirect('/home')->with('info', 'Post deleted successfully...');
    }
}
