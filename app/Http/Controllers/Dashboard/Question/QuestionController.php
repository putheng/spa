<?php

namespace App\Http\Controllers\Dashboard\Question;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index()
    {
    	return view('questions.index');
    }
}
