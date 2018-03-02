@extends('layout.layout')

@section('content')
  <div class="starter-template card">
    <h1>Edit User</h1>
    <hr>
      <form action="{{url('users', [$user->id])}}" method="POST">
      <input type="hidden" name="_method" value="PUT">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{$user->name}}" class="form-control" id="username"  name="name" >
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" value="{{$user->email}}" class="form-control" id="userEmail" name="email" >
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