<?php

namespace Modules\Note\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Note\Http\Requests\NoteRequest;
use Modules\Note\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::query()->latest()->paginatedCollection();

        return view('note::index', compact('notes'));
    }

    public function create()
    {
        return view('note::add');
    }

    public function store(NoteRequest $request)
    {
        Note::create($request->validated());

        return redirect()->route('notes.index');
    }

    public function edit(string $id)
    {
        $note = Note::query()->findOr($id);

        if (! $note) {
            return redirect()->route('notes.index');
        }

        return view('note::edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, $note)
    {
        $note = Note::query()->findOrFail($note);

        if (! $note) {
            return redirect()->route('notes.index');
        }

        $note->update($request->validated());

        return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::query()->findOrFail($id)->delete();

        return redirect()->route('notes.index');
    }
}
