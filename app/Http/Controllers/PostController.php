<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;

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
    public function getAllPost()
    {
        return $this->sendResponse($this->postService->getAll(), "Post list", 200, 1000);
    }
}
