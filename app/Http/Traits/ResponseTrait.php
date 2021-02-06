<?php

namespace App\Http\Traits;

trait ResponseTrait
{
	function sendResponse($data, $message = '', $status_code, $response_code)
	{
		$response_data = [
			'data' => $data,
			'message' => $message,
			'status' => $status_code,
			'response_code' => $response_code,
		];
		
		return response()->json($response_data, 200);
	}
}