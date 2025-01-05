@extends('layout.master_admin')

@section('content')

@if (session('successTambah'))
<div class="alert alert-success">
    {{ session('successTambah') }}
</div>
@endif

<div class="container mt-4">
    <h1>Data User</h1>
    <a href="{{ route('manageuser.create') }}" class="btn btn-primary mb-3">Tambah User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Nomor Telepon</th>
                <th>Role</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $usr)
            <tr>
                <td>{{ $usr->id }}</td>
                <td>{{ $usr->name }}</td>
                <td>{{ $usr->email }}</td>
                <td>{{ $usr->password }}</td>
                <td>{{ $usr->no_telepon }}</td>
                <td>{{ $usr->role }}</td>
                <td><img src="{{ asset('storage/' . $usr->foto) }}" width="50"></td>
                <td>
                    <a href="{{ route('manageuser.edit', $usr->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('manageuser.destroy', $usr->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection