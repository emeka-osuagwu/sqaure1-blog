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
        
        $response_data = [
            'user' => $this->userService->findWhere('email', $request->email)->get()->first(),
            'token' => $token
        ];
		return $this->sendResponse($response_data, "User login succsesfull", 200, 1000);
    }
    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	public function register(Request $request)
	{
	    /*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		$validator = $this->createUserValidation($request->all());

		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		if ($validator->fails()) 
		{	
			return $this->sendResponse($validator->errors(), "Registration validation error", 400, 1001);
		}
		
		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		$user = $this->userService->create($request->all('password', 'name', 'email'));

		return $this->sendResponse([], "User created", 200, 1000);
	}

    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
    public function getUserPost(Request $request)
    {
        $request['user_id'] = $request->auth_user->id;

        /*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		$validator = $this->findUserValidation($request->all());

		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		if($validator->fails()) 
		{	
			return $this->sendResponse($validator->errors(), "Validation error", 400, 1002);
        }

		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
        $posts = $this->postService->findWhere('user_id', $request->user_id)->get();
        
        return $this->sendResponse($posts, "Post", 200, 1000);
    }
}
