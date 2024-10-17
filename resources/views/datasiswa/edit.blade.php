@extends('datasiswa.layout')

@section('content')

@if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}',
        });
    </script>
@endif

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

<div class="card mt-4">
    <div class="card-header bg-success text-white">
        Edit Data Siswa
    </div>
    <div class="card-body">
        <form action="{{ route('siswa.update', $data_siswa['id']) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Siswa" max="100" value="{{ old('nama', $data_siswa['nama']) }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- NIS -->
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" max="8" value="{{ old('nis', $data_siswa['nis']) }}">
                @error('nis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- NISN -->
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" max="10" value="{{ old('nisn', $data_siswa['nisn']) }}">
                @error('nisn')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="jk" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jk" name="jk" required>
                    <option value="L" {{ old('jk', $data_siswa['jk']) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jk', $data_siswa['jk']) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Umur -->
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur" value="{{ old('umur', $data_siswa['umur']) }}">
                @error('umur')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jurusan -->
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan" required>
                    <option disabled {{ old('jurusan') == null ? 'selected' : '' }}>Pilih Jurusan</option>
                    <option value="PPLG" {{ old('jurusan', $data_siswa['jurusan']) == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                    <option value="DKV" {{ old('jurusan', $data_siswa['jurusan']) == 'DKV' ? 'selected' : '' }}>DKV</option>
                    <option value="TJKT" {{ old('jurusan', $data_siswa['jurusan']) == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                </select>
                @error('jurusan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@endpush
