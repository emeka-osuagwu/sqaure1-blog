<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait UserControllerRequestValidation
{

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function loginUserValidation($data)
	{
		$validator = Validator::make($data, [
			'email' => 'required_if:section,email|email|exists:users,email',
			'password' => 'required|string',
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
			'user_id' => 'required|integer|exists:users,id',
		]);

		return $validator;
    }

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createUserValidation($data)
	{
		$validator = Validator::make($data, [
			'name' => 'required|string',
			'email' => 'required|email|unique:users',
			'password' => 'required|string',
		]);

		return $validator;
	}
}