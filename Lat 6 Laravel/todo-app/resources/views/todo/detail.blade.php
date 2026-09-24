@extends('layout.app')

@section('content')

<h2>Detail Todo</h2>

<h3>{{ $todo['judul'] }}</h3>

<p>{{ $todo['keterangan'] }}</p>

<a href="{{ route('todo.index') }}" > Kembali </a>

@endsection

