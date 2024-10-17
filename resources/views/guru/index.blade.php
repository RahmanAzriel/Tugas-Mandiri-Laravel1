@extends('datasiswa.layout')

@section('title', 'Daftar Data Guru')

@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5>Daftar Guru</h5>
            <a href="{{ route('guru.create') }}" class="btn btn-success">Tambah Guru</a>
        </div>
        <div class="card-body">
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

            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="{{ route('guru.index') }}" method="GET" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari guru..." name="search_nama" id="search_nama" value="{{ request()->get('search_nama') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                @forelse ($guru as $index => $item)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm border-light rounded">
                            <div class="card-header text-center bg-light">
                                <h5 class="mb-0">{{ $item['nama'] }}</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="https://via.placeholder.com/100" alt="Profil" class="rounded-circle mb-2" />
                                <h5 class="card-title">NIP: {{ $item['nip'] }}</h5>
                                <p class="card-text">
                                    Jabatan: {{ $item['jabatan'] }}<br>
                                    Jenis Mata Pelajaran: {{ $item['mapel'] }}<br>
                                </p>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('guru.edit', $item['id']) }}" class="btn btn-primary" style="width: 80px; height: 40px">Edit</a>
                                    <form action="{{ route('guru.destroy', $item['id']) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger delete-button" style="width: 80px;">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">Tidak Ada Data</div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-between mt-4">
                <div>
                    {{ $guru->links() }}
                </div>
                <!-- Tombol Kembali hanya jika ada pencarian -->
                @if(request()->has('search_nama') && request()->get('search_nama') != '')
                    <div>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg me-2">
                            <i class="bi bi-arrow-left-circle"></i> Kembali
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.delete-form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data ini akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@endpush

<style>
    .card-header {
        background-color: #007bff;
        color: white;
    }
</style>
