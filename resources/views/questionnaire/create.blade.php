@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form action="{{ route('questionnaires.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Enter Title">
                            <small id="title-small-text" class="form-text text-muted">Give your questionnaire a title that attracts attention.</small>
                            @error('title')
                                <small class="text-danger border shadow p-2">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="purpose" placeholder="Enter Title">
                            <small id="purpose-small-text" class="form-text text-muted">Giving a purpose will increase responses.</small>

                            @error('purpose')
                                <small class="text-danger border shadow p-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
