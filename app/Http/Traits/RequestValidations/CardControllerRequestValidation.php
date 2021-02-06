<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait CardControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createCardValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|exists:users,id',
			'reference' => 'required',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function deleteCardValidation($data)
	{
		$validator = Validator::make($data, [
			'id' => 'required|integer|exists:cards',
		]);

		return $validator;
	}
}