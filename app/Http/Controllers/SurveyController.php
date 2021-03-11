<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire) {
        $questionnaire->load('questions.answers');
        // dd($questionnaire);

        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        // dd(request()->all());
        $data = request()->validate([
            'response.*.answer_id' => 'required',
            'response.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['response']);

        return 'Thank You';
    }

}
