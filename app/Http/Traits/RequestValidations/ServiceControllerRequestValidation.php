<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait ServiceControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function verifyBankAccountValidation($data)
	{
		$validator = Validator::make($data, [
			'account_number' => 'required|numeric',
			'bank_code' => 'required|numeric',
			'type' => 'required',
			'user_name' => 'required',
			'currency' => 'required',
		]);

		return $validator;
	}

}