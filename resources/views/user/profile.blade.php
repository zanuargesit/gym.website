    @extends('layout.master')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Profil Anda</div>

                    <div class="card-body">
                        <div class="text-center mb-4">
                            <!-- Tampilkan Foto Profil -->
                            <img
                                src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('img/default_profile.png') }}"
                                alt="Default Foto Profil"
                                class="rounded-circle img-fluid"
                                style="width: 150px; height: 150px; object-fit: cover;">


                            <!-- Tombol Hapus Foto -->
                            @if($user->foto)
                            <form action="{{ route('profile.deletePhoto', $user->id) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus Foto</button>
                            </form>
                            @endif
                        </div>

                        <!-- Form Edit Profil -->
                        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>
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
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="no_telepon" value="{{ $user->no_telepon }}" required>
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

                    <div class="container my-5">
    <h3 class="mb-4">Kelas yang Diikuti</h3>
    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Nama Kelas</th>
                    <th>Nama Trainer</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhir</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->joinClasses as $joinClass)
                    @if ($joinClass->class)
                        <tr>
                            <td class="text-start">
                                <span class="fw-bold">{{ $joinClass->class->name_class }}</span>
                                <br>
                                <small class="badge bg-info">Aktif</small>
                            </td>
                            <td>
                                <span>{{ $joinClass->class->trainer->name }}</span>
                                <br>
                                <small class="text-muted">Trainer</small>
                            </td>
                            <td>
                                <span class="text-success">{{ \Carbon\Carbon::parse($joinClass->class->start_time)->format('H:i') }}</span>
                            </td>
                            <td>
                                <span class="text-danger">{{ \Carbon\Carbon::parse($joinClass->class->end_time)->format('H:i') }}</span>
                            </td>
                            <td class="text-start">
                                <button class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $joinClass->class->description }}">
                                    <i class="bi bi-info-circle"></i> Lihat
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('admin.joinclasses.destroy', $joinClass->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group mb-2">
                                        <label for="reason" class="form-label fw-light">Alasan Keluar:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reason" value="no_join" required>
                                            <label class="form-check-label">Tidak Jadi</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reason" value="schedule_conflict" required>
                                            <label class="form-check-label">Konflik Jadwal</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="reason" value="other" required>
                                            <label class="form-check-label">Lainnya</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin keluar dari kelas ini?');">
                                        <i class="bi bi-x-circle"></i> Keluar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="6" class="text-muted">Data kelas tidak ditemukan.</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Aktifkan Bootstrap Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
    </div>
    @endsection