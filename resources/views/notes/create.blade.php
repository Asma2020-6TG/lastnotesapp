@extends('notes.layout')
@section('content')

    <form method="POST" action="{{route('notes.store')}}">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter your note title">
            @error('title')
            <small class="form-text text-danger"> {{$message}} </small>
            @enderror

        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">details</label>
            <input type="text" class="form-control" name="details" placeholder="write your note's details">

        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">  Save Note </button>
        </div>

@endsection


