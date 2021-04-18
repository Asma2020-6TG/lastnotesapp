@extends('notes.layout')
@section('content')


        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">{{ $notes->title }}</label>


        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">{{ $notes->details }}</label>

        </div>

    </form>
@endsection


