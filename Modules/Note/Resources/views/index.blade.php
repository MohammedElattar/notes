@extends('index')
@php
    $main_name = 'note';
    $message = 'Note';
    $title = 'Notes';
@endphp
@section('title', $title)
@section('content')
    @php
        if (session()->has("$main_name-added")) {
            echo "<div class='alert alert-success $main_name-added'>$message Added Successfully</div>";
            session()->forget("$main_name-added");
        } elseif (session()->has("$main_name-updated")) {
            echo "<div class='alert alert-success $main_name-updated'>$message Updated Successfully</div>";
            session()->forget("$main_name-updated");
        } elseif (session()->has("$main_name-deleted")) {
            echo "<div class='alert alert-success $main_name-deleted'>$message Deleted Successfully</div>";
            session()->forget("$main_name-updated");
        }
    @endphp

    <div class="d-flex flex-row justify-content-between align-items-center mb-4">
        <h2 class="mb-0">{{ $title }}</h2>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">Add {{ $message }}</a>
    </div>

    <div class="table-responsive">
        <table id="{{ $main_name }}" class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($notes as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->content }}</td>
                    <td>{{ $i->created_at }}</td>
                    <td>
                        <a href="{{ route('notes.edit', ['note' => $i->id]) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('notes.destroy', $i->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this note?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $notes->links() }}
    </div>
@endsection
