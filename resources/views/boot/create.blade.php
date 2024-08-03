@extends('template.layouts')

@section('main')
    <div class="container">
        <div class="row pt-3">
            <div class="col">
                <header class="">
                    <h1>Boot {{ Auth::user()->nama }}</h1>
                </header>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h4>Buat boot baru</h4>
                <form action="{{ route('boot.store') }}" method="post" class="py-3">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="namaBoot" class="form-label">Nama Boot anda</label>
                        <input type="text" class="form-control" id="namaBoot" name="boot"
                            aria-describedby="emailHelp" placeholder="Masukan nama boot anda..">
                        @error('boot')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @session('success')
                    @include('components.alert.success')
                @endsession
            </div>
        </div>
    </div>
@endsection
