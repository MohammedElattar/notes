@extends('index')
@php
    $main_name = 'note';
    $message = 'Note';
    $title = 'Note';
@endphp
@section('title', "Add $message")
@section('content')
    <div style="width: 60%;margin:auto">
        <h3 class="text-center">Add {{ $message }}</h3>
        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger text-center">
                @php
                    foreach ($errors->all() as $i) {
                        echo $i;
                    }
                @endphp
            </div>
        @endif
        <form action={{ route("notes.store") }} method="POST">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" value="{{ old('name') }}" name="content"> </textarea>
            </div>
            <input type="submit" value="Add {{ $message }}" class="btn btn-primary">
        </form>
    </div>
@endsection
