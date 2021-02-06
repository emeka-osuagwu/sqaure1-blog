<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait GuarantorControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createGuarantorValidation($data)
	{
		$validator = Validator::make($data, [
			'guarantor_phone_number' => 'required|numeric|exists:users,phone_number',
		]);

		return $validator;
    }
    
	/*
	|--------------------------------------------------------------------------
	*/
	public function guarantorApprovalValidation($data)
	{
		$validator = Validator::make($data, [
			'guarantor_id' => 'required|integer|exists:guarantors,id',
		]);

		return $validator;
	}
    
	/*
	|--------------------------------------------------------------------------
	*/
	public function adminApprovalValidation($data)
	{
		$validator = Validator::make($data, [
			'status' => 'required|boolean',
			'guarantor_id' => 'required|integer|exists:guarantors,id',
		]);

		return $validator;
	}
}