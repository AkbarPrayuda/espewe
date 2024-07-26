@extends('template.admin')
@section('mainAdmin')
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="border rounded border-dark-0 p-4 my-5" action="{{ route('jurusan.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <header>
                        <h1>Tambah Jurusan</h1>
                    </header>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan">
                        @error('jurusan')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @session('success')
                    @include('components.alert.success')
                @endsession
                <h3>Daftar Jurusan yang tersedia: </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="text-center align-middle">Jurusan</th>
                            <th scope="col" class="text-center align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurusan as $i => $j)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td class="text-center align-middle">{{ $j->jurusan }}</td>
                                <td class="d-flex gap-3 justify-content-center align-items-center">
                                    <form action="{{ route('jurusan.destroy') }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $j->id }}">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin akan menghapus jurusan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $jurusan->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
