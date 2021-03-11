@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    <form action="{{ route('survey.store', ['questionnaire'=> $questionnaire->id, 'slug' => Str::slug($questionnaire->title)]) }}" method="post">
                        @csrf

                        @foreach ($questionnaire->questions as $key=>$question)
                            <div class="card mt-4">
                                <div class="card-header"><strong>{{ $key+1 }}</strong> - {{ $question->question}}</div>

                                @error('response.'.$key.'.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($question->answers as $answer)
                                            <label for="answer{{ $answer->id }}">
                                                <li class="list-group-item">
                                                    <input type="radio" value="{{ $answer->id }}" name="response[{{ $key }}][answer_id]"
                                                     id="answer{{ $answer->id }}
                                                     {{ old('response.'.$key.'.answer_id')== $answer->id ? 'checked' : '' }}
                                                     ">
                                                    {{ $answer->answer }}
                                                </li>

                                                <input type="hidden" name="response[{{ $key }}][question_id]" value="{{ $question->id }}">
                                            </label>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        @endforeach


                        <div class="card mt-4">
                            <div class="card-header">Please Fill-up information</div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="survey[name]" class="form-control" id="name" aria-describedby="name" placeholder="Enter your name">
                                    <small id="name-small-text" class="form-text text-muted">Give your name.</small>
                                    @error('survey.name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="survey[email]" class="form-control" id="email" aria-describedby="email" placeholder="Enter your email">
                                    <small id="email-small-text" class="form-text text-muted">Please Give me your email.</small>

                                    @error('survey.email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark mt-4">Complete Survey</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
