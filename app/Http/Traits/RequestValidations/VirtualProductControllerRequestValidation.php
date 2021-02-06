<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait VirtualProductControllerRequestValidation
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
	public function dcsdValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|exists:users,id',
			'virtual_product_id' => 'required|exists:virtual_products,id',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function claimProductValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|exists:users,id',
			'promo_id' => 'required|integer'
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function transferProductValidation($data)
	{
		$validator = Validator::make($data, [
			'phone_number' => 'required|exists:users,phone_number',
			'virtual_product_id' => 'required|exists:virtual_products,id',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function assignProductToUserValidation($data)
	{
		$validator = Validator::make($data, [
			'product_name' => 'required|string',
			'product_image' => 'required|url',
			'product_description' => 'required|string',
			'product_model' => 'required|string',
			'status' => 'required|string',
			'type' => 'required|string',
			'category' => 'required|string',
		]);

		return $validator;
	}
}