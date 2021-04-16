<?php

namespace App\Http\Controllers\ApiNotes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;


class ApiNotesController extends Controller
{

    public function index()
    {
        $notes = Note::all();
        return response($notes,200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data=$request->validate([
            'user_id' => '',
            'username'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);
        $note= Note::create($data);
        return response($note,200);
    }


    public function show($username)
    {
        $notes = Note::where('username',$username)->get();
        return response($notes,200);
    }


    public function edit(Request $request,$id)
    {

        $request->validate([
            'username'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);
        $note= Note::where('id', $id)-> update($request, $id);
        return response($request,'note updated successfully');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);
        $note= Note::where('id', $id)-> update($request, $id);
        return response($request,200);
    }


    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return response('note deleted, 200');
    }
}
