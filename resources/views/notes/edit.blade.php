@extends('notes.layout')
@section('content')
    <div class="create">
        <h1> Edit note </h1>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <h2> Note edited successfully </h2>
        </div>
    @endif
    <form  action="{{ URL('notes.update',['id'=>$note->id])}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{ $note->title }}" placeholder="Enter your note title">

        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">details</label>
            <input type="text" class="form-control" name="details" value="{{ $note->details }}"placeholder="write your note's details">

        </div>
        <div class="col-12">

            <a class="btn btn-success"> Save modifications </a>
        </div>
    </form>
@endsection


