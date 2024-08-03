@extends('template.layouts')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col my-5 ">
                <div class="card">
                    <h5 class="card-header">Detail Boot Anda</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $boot->boot }}</h5>
                        <p class="card-text">Dibuat oleh : {{ $boot->user->nama }}</p>
                        <a href="#" class="btn btn-primary">Tambah Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
