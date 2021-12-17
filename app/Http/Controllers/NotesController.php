<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\Note;


class NotesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $user = auth()->user();
        $notes = Note::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(5);
        return view('home', ['notes' => $notes]);
    }

    public function create() {
        return view('notes.create');
    }

    public function store(Request $request) {

        $user = auth()->user();

        $attributes['user_id'] = $user->id;
        $attributes['title'] = $request->title;
        $attributes['description'] = $request->description;
        Note::create($attributes);

        return redirect('/');
    }

    public function edit(Request $request) {

        $note = Note::getById($request->id);

        return view('notes.edit', compact('note'));
    }

    public function update(Request $request) {
        
        $note = Note::getById($request->id);

        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();

        return redirect('/');
    }

    public function destroy(Request $request) {

        $note = Note::getById($request->id);

        $note->delete();

        return redirect('/');
    }

    public function validateInput()
    {
        return request()->validate([
            'title'       => 'required|min:1',
            'description' => 'required|min:1',
        ]);
    }
}
