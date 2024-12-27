@extends('layouts.default')
@section('page-title', 'Users')
@section('page-actions')
    <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
@endsection
@section('content')
@session('status')
    <div class="alert alert-success">
        {{ $value }}
    </div>    
@endsession

<form action="{{ route('users.index') }}" method="GET" class="mb-3">
  <div class="input-group input-group-sm" style="width: 300px">
    <input type="text" name="keyword" class="form-control" placeholder="Search..." value="{{ request()?->keyword }}">
    <button type="submit" class="btn btn-primary">Search</button>
  </div>
</form>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)    
        <tr>
          <th scope="row">{{ $user->id }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @can('edit', auth()->user())  
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-small">Edit</a>            
            @endcan
            @can('destroy', auth()->user())  
              <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-small">Delete</button>
              </form>
            @endcan 
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{ $users->links() }}
@endsection