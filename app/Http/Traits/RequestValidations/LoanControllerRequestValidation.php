<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait LoanControllerRequestValidation
{
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createLoanValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			// 'vendor_id' => 'required|integer|exists:users,id',
			'vendor_id' => 'required|integer',
			'remark' => 'required|string',
			'amount' => 'required|numeric',
			'location' => 'required',
		]);

		return $validator;
	}
}