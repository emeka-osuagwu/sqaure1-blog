<?php

namespace App\Http\Services;

use App\Models\Post;

class PostService
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function getAll() {
		return Post::with('user')->latest()->get();
    }

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function findWhere($field, $value) {
		return Post::where($field, $value);
    }

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function create($data) {
		return Post::create($data);
    }
    
}
