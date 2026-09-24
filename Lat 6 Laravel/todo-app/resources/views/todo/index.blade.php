@extends('layout.app')

@section('content')

<h2>Daftar Todo</h2>

@foreach ($todos as $index => $todo)

<a href="{{ route('todo.detail', $index) }}">{{ $todo->judul }}</a>

@endforeach

@endsection

