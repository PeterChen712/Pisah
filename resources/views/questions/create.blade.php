@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ask a Question</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Question</button>
    </form>
</div>
@endsection