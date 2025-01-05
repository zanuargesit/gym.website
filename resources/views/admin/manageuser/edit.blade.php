@extends('layout.master_admin')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit User</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('manageuser.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="form-label">Nama:</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
        <label class="form-label">Email:</label>
        <input class="form-control" type="email" name="email" value="{{$user->email}}" required>
        <label class="form-label">Password:</label>
        <input class="form-control" type="password" name="password" value="{{$user->password}}" required>
        <label class="form-label">Nomor Telepon:</label>
        <input class="form-control" type="text" name="no_telepon" value="{{$user->no_telepon}}" required>
        <label class="form-label">Role:</label>
        <select class="form-control" name="role" id="role" value="{{$user->role}}">
            <option value="">-- Pilih Role --</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="trainer">Trainer</option>
        </select>
        <label class="form-label">Foto:</label>
        <input class="form-control" type="file" name="foto">
        <button class="btn btn-primary" type="submit">Update</button>
    </form>
</div>
@endsection