@extends('layout.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Profil Anda</div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <img
                            src="{{ $trainer->foto ? asset('storage/' . $trainer->foto) : asset('img/default_profile.png') }}"
                            alt="Default Foto Profil"
                            class="rounded-circle img-fluid"
                            style="width: 150px; height: 150px; object-fit: cover;">

                        @if($trainer->foto)
                        <form action="{{ route('trainer.profile.deletePhoto', $trainer->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus Foto</button>
                        </form>
                        @endif
                    </div>

                    <form action="{{ route('trainer.profile.update', $trainer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $trainer->name }}" required autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $trainer->email }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="no_telepon" value="{{ $trainer->no_telepon }}" required>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto Profil</label>
                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="container mt-4">
    <h3>Kelas yang Diampu</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Nama Trainer</th>
                <th>Jam Mulai</th>
                <th>Jam Berakhir</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->name_class }}</td>
                    <td>{{ $class->trainer->name }}</td> 
                    <td>{{ $class->start_time }}</td>
                    <td>{{ $class->end_time }}</td>
                    <td>{{ $class->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


    </div>
</div>
@endsection
