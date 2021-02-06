<?php

namespace App\Http\Traits\RequestValidations;

use Validator;

trait PaymentControllerRequestValidation
{
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function scanToPayValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'loan_contract_id' => 'required_if:payment_method,localman_pay|integer|exists:loan_contracts,id',
			'vendor_id' => 'required|integer',
			'amount' => 'required|numeric',
			'payment_method' => 'required|string|in:localman_pay,localman_wallet',
			'name' => 'required|string',
			'location' => 'required|string',
		]);

		return $validator;
	}

	/*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function loanPaymentValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'vendor_id' => 'required|integer',
			'amount' => 'required|numeric',
			'payment_method' => 'required|string|in:localman_pay,localman_wallet',
			'name' => 'required|string',
			'location' => 'required|string',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function loanPaybackValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'loan_id' => 'required|integer|exists:loans,id',
			'payment_method' => 'required|string|in:localman_wallet,credit_card',
			'location' => 'required|string',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function productPaymentValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'location' => 'required',
			'vendor_id' => 'required|integer',
			'delivery_fee' => 'required|integer',
			'delivery_address' => 'required|string',
			'payment_method' => 'required|string|in:localman_pay,localman_wallet',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function loanCardPament($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'loan_id' => 'required|integer|exists:cards,id',
			'remark' => 'required|string',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function loanCardPamentValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'loan_id' => 'required|integer|exists:loans,id',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function walletTopupValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'payment_method_id' => 'required|integer|exists:cards,id',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function transferToUserWalletValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'amount' => 'required|numeric',
			'remark' => 'required',
			'location' => 'required',
			'loan_contract_id' => 'required_if:payment_method,localman_pay|integer|exists:loan_contracts,id',
			'payment_method' => 'required|string|in:localman_pay,localman_wallet',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function bankTransferValidation($data)
	{
		$validator = Validator::make($data, [
			'user_id' => 'required|integer|exists:users,id',
			'amount' => 'required|numeric',
			'bank_name' => 'required|string',
			'account_number' => 'required|numeric',
			'remark' => 'required',
			'currency' => 'required',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function mobileServicePaymentValidation($data)
	{
		$validator = Validator::make($data, [
			'amount' => 'required|numeric',
			'phone_number' => 'required_if:section,phone_number|numeric',
			'billers_code' => 'required_if:service,tv_subscription|numeric',
			'service' => 'required|string|in:airtime,data,tv_subscription',
			'payment_method' => 'required|string|in:localman_pay,localman_wallet',
			'service_data' => 'required_if:service,data',
			'user_id' => 'required|integer|exists:users,id',
			'provider' => 'required|string|in:mtn,glo,etisalat,airtel,dstv,startimes,gotv',
			'vendor_id' => 'required|integer|exists:vendors,id',
			'loan_contract_id' => 'required|integer|exists:loan_contracts,id',
			'location' => 'required',
		]);

		return $validator;
	}

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function transferRequestValidation($data)
	{
		$validator = Validator::make($data, [
			'amount' => 'required|numeric',
			'remark' => 'required|string',
			'phone_number' => 'required|numeric|exists:users,phone_number',
		]);

		return $validator;
	}
}