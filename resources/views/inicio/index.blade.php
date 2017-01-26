@extends('layouts.admin')

@section('content')
    <br>
    @if(Session::has('message-error'))
        <div class="alert alert-danger">
            <p>
                {{Session::get('message-error')}}
            </p>
        </div>
    @endif
    <br>
    <h1>Bienvenido!!!</h1>
@endsection