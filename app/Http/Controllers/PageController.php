<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return [
            'message' => 'welcome to square1 api',
            'version' => '1.0.0',
        ];
    }
}
