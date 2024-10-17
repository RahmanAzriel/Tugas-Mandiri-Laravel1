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

<div class="card mt-4">
    <div class="card-header bg-success text-white">
        Edit Data Guru
    </div>
    <div class="card-body">
        <form action="{{ route('guru.update', $guru['id']) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Guru</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Guru" max="100" value="{{ old('nama', $guru['nama']) }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- NIP -->
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" max="8" value="{{ old('nip', $guru['nip']) }}">
                @error('nip')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jabatan -->
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" value="{{ old('jabatan', $guru['jabatan']) }}">
                @error('jabatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jenis Mapel -->
            <div class="mb-3">
                <label for="mapel" class="form-label">Jenis Mapel</label>
                <select class="form-select" id="mapel" name="mapel">
                    <option value="" disabled {{ old('mapel') == null ? 'selected' : '' }}>Pilih Mapel</option>
                    <option value="IPA" {{ old('mapel', $guru['mapel']) == 'IPA' ? 'selected' : '' }}>IPA</option>
                    <option value="IPS" {{ old('mapel', $guru['mapel']) == 'IPS' ? 'selected' : '' }}>IPS</option>
                    <option value="Bahasa Indonesia" {{ old('mapel', $guru['mapel']) == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa Indonesia</option>
                    <option value="Bahasa Inggris" {{ old('mapel', $guru['mapel']) == 'Bahasa Inggris' ? 'selected' : '' }}>Bahasa Inggris</option>
                    <option value="PROD" {{ old('mapel', $guru['mapel']) == 'PROD' ? 'selected' : '' }}>PROD</option>
                    <option value="MTK" {{ old('mapel', $guru['mapel']) == 'MTK' ? 'selected' : '' }}>MTK</option>
                </select>
                @error('mapel')
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
