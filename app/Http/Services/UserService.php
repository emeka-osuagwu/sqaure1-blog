<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function getAll() {
		return User::all();
    }

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function findWhere($field, $value) {
		return User::where($field, $value);
    }

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function create($data) {
		return User::create($data);
    }
    
}
