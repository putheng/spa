<?php

namespace App\Http\Controllers\Dashboard\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function index()
    {
    	return view('questions.update');
    }
}
