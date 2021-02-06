<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait KycControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function approveUserKycValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|numeric|exists:users,id',
			'kyc_id' => 'required|numeric|exists:kycs,id',
		]);

		return $validator;
    }
    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|numeric|exists:users,id',
			'type' => 'required|string|in:bvn,selfie_photography,id_card,utility_bill',
			'value' => 'required',
		]);

		return $validator;
	}
}