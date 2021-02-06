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
			'username' => 'required_if:section,username|string|exists:users,username',
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
			'id' => 'required|integer|exists:users,id',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function loanActivationValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'can_take_loan' => 'required|boolean',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function updateUserValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'require|integer|exists:users,id',
			'name' => 'required_if:section,name|string',
			'sex' => 'required_if:section,sex|string|in:male,female',
			'phone_number' => 'required_if:section,phone_number|string',
			'avatar' => 'required_if:section,avatar|file',
			
			'push_token' => 'required_if:section,push_token|string',
			'active_card_id' => 'required_if:section,active_card_id|integer',
			
			'email' => 'required_if:section,email|email|unique:users',
			'password' => 'required_if:section,password|string|min:5',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function passwordResetValidation($data)
	{
		$validator = Validator::make($data, [
			'phone_number' => 'required|numeric|exists:users,phone_number',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function passwordResetUpdateValidation($data)
	{
		$validator = Validator::make($data, [
			'otp' => 'required|numeric|exists:tokens,token',
			'phone_number' => 'required|numeric|exists:users,phone_number',
			'password' => 'required|string|min:5',
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
			'password' => 'required|string',
			'username' => 'required|string|unique:users',
			'phone_number' => 'required|numeric|unique:users',
			'referral' => 'required_if:section,referral|numeric|exists:users,phone_number',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function accountActivationValidation($data)
	{
		$validator = Validator::make($data, [
			'otp' => 'required|numeric|exists:tokens,token',
			'phone_number' => 'required|numeric|exists:users,phone_number',
		]);

		return $validator;
	}


	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function updatePasswordValidation($data)
	{
		$validator = Validator::make($data, [
			'password' => 'required|string',
			'new_password' => 'required_if:section,new_password|string|min:5',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function updateDevicePasswordValidation($data)
	{
		$validator = Validator::make($data, [
			'password' => 'required|string',
			'device_password' => 'required|string',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function updateProfileImageValidation($data)
	{
		$validator = Validator::make($data, [
			'image' => 'required',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function updateLoanStatusValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'status' => 'required|string|in:true,false',
			
		]);

		return $validator;
	}

}