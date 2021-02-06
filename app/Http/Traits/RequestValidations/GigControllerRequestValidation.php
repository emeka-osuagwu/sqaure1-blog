<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait GigControllerRequestValidation
{
	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function redeemValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|exists:users,id',
			'vendor_id' => 'required|numeric',
			'virtual_product_id' => 'required|numeric|exists:virtual_products,id',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function applyValidation($data)
	{
		$validator = Validator::make($data, [
			'gig_id' => 'required|exists:gigs,id',
			'user_id' => 'required|exists:users,id',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function approveValidation($data)
	{
		$validator = Validator::make($data, [
            'user_id' => 'required|integer|exists:users,id',
            'application_id' => 'req  uired|integer|exists:applications,id',
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
            // 'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function activateValidation($data)
	{
		$validator = Validator::make($data, [
            'gig_id' => 'required|integer|exists:gigs,id',
            'user_id' => 'required|integer|exists:users,id',
		]);

		return $validator;
	}
}