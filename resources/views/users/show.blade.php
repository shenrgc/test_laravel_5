@extends('layout.layout')

@section('content')
  <div class="starter-template card">
    <h1>Showing User</h1>
    <hr>
    <div>
      <p>
        <strong>Name:</strong> {{ $user->name }}<br>
        <strong>Email:</strong> {{ $user->email }}
      </p>
    </div>
  </div>
@endsection