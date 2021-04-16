<?php

namespace App\Http\Controllers\ApiNotes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;


class ApiNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        return response($notes,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => '',
            'username'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);
        $note= Note::create($data);
        return response($data,200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $notes = Note::where('username',$username)->get();
        return response($notes,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        $data = $request->validate([
            'username'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);
        $note= Note::where('id', $id)-> update($data, $id);
        return response($data,'note updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'username'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);
        $note= Note::where('id', $id)-> update($data, $id);
        return response($data,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return response('note deleted, 200');
    }
}
