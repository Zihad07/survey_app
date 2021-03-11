@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title}}</div>

                <div class="card-body">
                   <a href="{{ route('questionnaires.question.create', $questionnaire->id) }}" class="btn btn-dark">Add new question</a>
                   <a href="{{ route('survey.show', ['questionnaire' =>$questionnaire->id, 'slug' =>Str::slug($questionnaire->title)]) }}" class="btn btn-dark">Take a survey</a>
                   {{-- <a href="{{ route('survey.show', ['questionnaire' =>$questionnaire->id, 'slug' =>Str::slug($questionnaire->title)] }}" class="btn btn-dark">Take a survey</a> --}}
                </div>
            </div>

            @foreach ($questionnaire->questions as $question)
                <div class="card mt-4">
                    <div class="card-header">{{ $question->question}}</div>
                    <div class="card-header">Resonses {{ $question->responses->count()}}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <div>
                                        {{ $answer->answer }}
                                    </div>

                                    <div>
                                        @if ($question->responses->count())
                                            {{ intval( ($answer->responses->count() * 100) /$question->responses->count()) }}%
                                        @endif

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="card-footer">
                        <form action="{{ route('questionnaires.question.delete' ,['questionnaire' =>$questionnaire->id, 'question' => $question->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" onclick="return confirm('Are you want to delete this question?')" class="btn btn-outline-danger" value="Delete">
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
