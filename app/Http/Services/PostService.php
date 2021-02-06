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
		return Post::all();
    }
    
}
