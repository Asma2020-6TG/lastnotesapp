<?php

namespace App\Http\Controllers\WebNotes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class WebNotesController extends Controller
{

    public function index()
    {
        $note = Note::all()->paginate(10);

        return view('notes.index',compact('note'));
    }


    public function create()
    {
        return view('notes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'title'=>'required',
            'details'=>'required'
        ]);
        $note = Note::create($request->all());
        return redirect()->route('notes.index')
        ->with('success','note added successfully');
    }


    public function show($username)
    {
        $notes = Note::where('username',$username)->get();
        return view('notes.show',compact('note'));
    }


    public function edit($id)
    {
        return view('notes.edit',compact('note'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>'required',
            'title'=>'required',
            'details'=>'required'
        ]);
        $note = Note::update($request->all());
        return redirect()->route('notes.index')
            ->with('success','note updated successfully');
    }


    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('notes.index')
            ->with('success','note deleted successfully');

    }
}
