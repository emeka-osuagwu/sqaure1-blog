<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\RequestValidations\PostControllerRequestValidation;

use App\Http\Services\PostService;

class PostController extends Controller
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
    use PostControllerRequestValidation;

    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
	protected $postService;

	public function __construct
	(
		PostService $postService
	)
	{
		$this->postService = $postService;
		parent::__construct();
    }
    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
    public function get()
    {
        return $this->sendResponse($this->postService->getAll(), "Post list", 200, 1000);
    }
    
    /*
	|--------------------------------------------------------------------------
	| Add Comment
	|--------------------------------------------------------------------------
	*/
    public function find($id)
    {
        /*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		$validator = $this->findPost(['id' => $id]);

		/*
		|--------------------------------------------------------------------------
		| Add Comment
		|--------------------------------------------------------------------------
		*/
		if($validator->fails()) 
		{	
			return $this->sendResponse($validator->errors(), "Record dont exist", 400, 1002);
        }

        $post = $this->postService->findWhere('id', $id)->get()->first();
        
        return $this->sendResponse($post, "Post", 200, 1000);
    }
}
