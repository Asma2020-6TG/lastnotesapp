@extends('notes.layout')
@section('content')

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Details</th>
                <th scope="col">Operations</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($notes as $note)
            <tr>
                <th scope="row">{{$note->id}}</th>
                <td>{{$note->title}}</td>
                <td>{{$note->details}}</td>
            <td>
                <a href="{{route('notes.edit',$note->id)}}" class="btn btn-success"> Edit</a>
                <div>
                <from action="{{ url('notes.destroy'),$note->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" > Delete </button>
                </from>
                </div>
            </td>

            </tr>
            @endforeach

            </tbody>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </table>



    </div>
@endsection


