<?php

namespace App\Http\Controllers\Dashboard\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateAnswerRequest;
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

    public function answer(Request $request, Question $question)
    {
    	$question->load('answers');
    	return view('questions.answer', compact('question'));
    }

    public function update(UpdateAnswerRequest $request)
    {

    }
}
