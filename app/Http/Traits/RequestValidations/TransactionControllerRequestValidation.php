<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait TransactionControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function createTransactionValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|exists:users,id',
			'product_id' => 'required|exists:products,id',
			'payment_method_id' => 'required_if:payment_method_id,id|integer|exists:cards,id',
			'payment_method_type' => 'required_if:payment_method_id,id|string',
			
			'amount' => 'required|string',
			'remark' => 'required|string',
			
			'status' => 'required|string',
			'type' => 'required|string',
		]);

		return $validator;
	}
}