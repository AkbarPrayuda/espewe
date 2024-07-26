@extends('template.layouts')
@section('main')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <form action="{{ route('registerStore') }}" method="post">
                    @csrf
                    @method('POST')
                    <h1>Buat akun anda!</h1>
                    <div class="mb-3">
                        <label for="text" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" placeholder="Nama anda.." value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="contoh: (contoh@gmail.com)" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="********">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kelas_id" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas_id" name="kelas_id" aria-label="Default select example">
                            @forelse ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->kelas . ' ' . $k->jurusan->jurusan }} </option>
                            @empty
                                <option value="{{ null }}" selected>Tidak ada kelas tersedia</option>
                            @endforelse
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
