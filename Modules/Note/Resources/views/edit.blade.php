@extends('index')
@php
    $main_name = 'Note';
    $message = 'Note';
    $title = 'Note';
@endphp
@section('title', "Update $message")
@section('content')
    <div style="width: 60%; margin: auto;">
        <h3 class="text-center">Update {{ $message }} </h3>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('notes.update', ['note' => $note->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" autofocus>{{ old('content', $note->content) }}</textarea>
            </div>

            <input type="submit" value="Update Note" class="btn btn-primary">
        </form>
    </div>
@endsection
