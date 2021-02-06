<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\RequestValidations\UserControllerRequestValidation;

use App\Http\Services\PostService;
use App\Http\Services\UserService;

class UserController extends Controller
{
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
    use ResponseTrait;
    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
    use UserControllerRequestValidation;

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
    protected $userService;
    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	protected $postService;

	public function __construct
	(
		UserService $userService,
		PostService $postService
	)
	{
		$this->postService = $postService;
		$this->userService = $userService;
		parent::__construct();
    }

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function login(Request $request)
	{
	    /*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		$validator = $this->loginUserValidation($request->all());

		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		if($validator->fails()) 
		{	
			return $this->sendResponse($validator->errors(), "Login validation error", 400, 1002);
		}
		
		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		$token = auth()->attempt($request->only('password', 'email'));
		
	   	if(!$token) {
	       return $this->sendResponse([], "Invalid Email or Password", 400, 1000);
	   	}
	
		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		return $this->sendResponse($token, "User login succsesfull", 200, 1000);
	}
    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
    public function getUserPost(Request $request)
    {
        $request['user_id'] = 1;

        /*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		$validator = $this->createPost($request->all());

		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		if($validator->fails()) 
		{	
			return $this->sendResponse($validator->errors(), "Validation error", 400, 1002);
        }

        $request_data = $request->only([
            'title',
            'user_id',
            'description',
        ]);
        
        $request_data['publication_date'] = now();
 
        $post = $this->postService->create($request_data);
        
        return $this->sendResponse($post, "Post", 200, 1000);
    }
}
