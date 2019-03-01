<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required'
    	]);
    }
}
