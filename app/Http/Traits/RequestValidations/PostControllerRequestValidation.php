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
    
}