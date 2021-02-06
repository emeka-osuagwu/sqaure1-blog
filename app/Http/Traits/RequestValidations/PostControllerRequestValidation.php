<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait PostControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function findPost($data)
	{
		$validator = Validator::make($data, [
			'id' => 'required|integer|exists:posts,id',
		]);

		return $validator;
    }
    
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createPost($data)
	{
		$validator = Validator::make($data, [
			'title' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
			'description' => 'required|string',
		]);

		return $validator;
    }
}