<?php

namespace App\Http\Controllers\WebNotes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class WebNotesController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        $notes = Note::all();

        return view('notes.index',compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }




    public function store(Request $request)
    {
        $rules=
            [
                'title' => 'required|unique:notes,title|max:100',
                'details' => 'required||max:250'
            ];
        $message=
            ['title.required'=> 'you should insert note',
                'title.unique'=> 'try with another title',
                'details.required'=> 'what are note details?'
            ];
        $validator = Validator::make($request ->all(),$rules,$message);


        $note=Note::create([
            'user_id'=> Auth::id(),
            'name' => 'required',
            'title' => 'required',
            'details' => 'required',
        ]);
        return redirect()->route('notes.index')
        ->with('success','note added successfully');
    }


    public function show(Note $name)
    {
        $notes = Note::where('name',$name)->get();
        return view('notes.show',compact('notes'));
    }


    public function edit($id)
    {
        $note =Note::find($id);
        return view('notes.edit')->with('note',$note);
    }

    public function update(Request $request, $id)

    {
        $note= Note::find($id);
        $request->validate([

            'title'=>'required',
            'details'=>'required'
        ]);
        $note->update($request->all());
        return redirect()->route('notes.index')
            ->with('success','note updated successfully');
        $note->title =$request->title;
        $note->details =$request->details;
        $note->save;
        return redirect()->back();
    }


    public function destroy(Note $id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('notes.index')
            ->with('success','note deleted successfully');

    }
}
