<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function show( Questionnaire $questionnaire ) {


    }
    public function create(Questionnaire $questionnaire) {
        return view('question.create')->with(compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire) {
        // dd(request()->all());

        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        // dd($data);

        $question = $questionnaire->questions()->create($data['question']);

        $question->answers()->createMany($data['answers']);

        return redirect()->route('questionnaires.show', $questionnaire->id);


    }

    public function destroy(Questionnaire $questionnaire, Question $question) {
        // dd($question->answers);
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }
}
