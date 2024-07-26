@extends('template.admin')
@section('mainAdmin')
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="border rounded border-dark-0 p-4 my-5" action="{{ route('kelas.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <header>
                        <h1>Tambah Kelas</h1>
                    </header>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" name="kelas" id="kelas">
                        @error('kelas')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jurusan_id">Jurusan</label>
                        <select name="jurusan_id" id="jurusan_id" class="form-select" aria-label="Default select example">
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}">{{ $j->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @session('success')
                    @include('components.alert.success')
                @endsession
                <h3>Daftar Kelas yang tersedia: </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" class="text-center align-middle">kelas</th>
                            <th scope="col" class="text-center align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $i => $k)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td class="text-center align-middle">{{ $k->kelas }} {{ $k->jurusan->jurusan }}</td>
                                <td class="d-flex gap-3 justify-content-center align-items-center">
                                    <form action="{{ route('kelas.destroy') }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $k->id }}">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin akan menghapus jurusan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $kelas->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
