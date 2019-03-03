<?php

namespace App\Http\Controllers\Dashboard\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class CreateController extends Controller
{
    public function index()
    {
    	return view('questions.create');
    }

    public function store(StoreQuestionRequest $request)
    {
    	$question = Question::create($request->only('titleKh', 'titleEn'));

    	return new QuestionResource($question);
    }

    public function answer(Request $request)
    {
    	$this->validate($request, [
    		'answers.*.answer' => 'required'
    	]);
    }
}
