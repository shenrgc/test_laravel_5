@extends('layout.layout')

@section('content')
  <div class="starter-template card">
    <h1>Add New User</h1>
    <hr>
      <form action="/users" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name"  name="name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection