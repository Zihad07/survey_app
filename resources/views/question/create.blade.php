@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form action="{{ route('questionnaires.question.store', ['questionnaire'=> $questionnaire->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question">question</label>
                            <input type="text" name="question[question]" class="form-control" id="question"
                             value="{{ old('question.question') }}"
                            aria-describedby="question" placeholder="Enter Question....">
                            <small id="question-small-text" class="form-text text-muted">Ask simple and to-the-point questions for best results.</small>
                            @error('question.question')
                                <small class="text-danger border shadow p-2 w-100">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small>Give choices that give you most insight into your question.</small>

                                <div>

                                    <div class="form-group">
                                        <label for="answer1">Choice 1</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer1"
                                        value="{{ old('answers.0.answer') }}"
                                        placeholder="Enter Choice 1">

                                        @error('answers.0.answer')
                                            <small class="text-danger border shadow p-2 w-100">{{  $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="answer2">Choice 2</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer2"
                                        value="{{ old('answers.1.answer') }}"
                                        placeholder="Enter Choice 2">

                                        @error('answers.1.answer')
                                            <small class="text-danger border shadow p-2 w-100">{{  $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="answer3">Choice 3</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer1"
                                        value="{{ old('answers.2.answer') }}"
                                        placeholder="Enter Choice 3">

                                        @error('answers.2.answer')
                                            <small class="text-danger border shadow p-2 w-100">{{  $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="answer4">Choice 4</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer4"
                                        value="{{ old('answers.4.answer') }}"
                                        placeholder="Enter Choice 4">

                                        @error('answers.3.answer')
                                            <small class="text-danger border shadow p-2 w-100">{{  $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
