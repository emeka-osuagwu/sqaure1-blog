<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait ChatControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createChatValidation($data)
	{
		$validator = Validator::make($data, [
			'message' => 'required|string',
			'sender_id' => 'required',
			'receiver_id' => 'required',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function findUserValidation($data)
	{
		$validator = Validator::make($data, [
			'id' => 'required|integer|exists:users,id',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function loginUserValidation($data)
	{
		$validator = Validator::make($data, [
			'email' => 'required|email|exists:users',
			'password' => 'required|string',
		]);

		return $validator;
	}
}