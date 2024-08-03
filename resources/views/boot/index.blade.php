@extends('template.layouts')

@section('main')
    <div class="container">
        <h1 class="mt-3">Boot Saya</h1>
        <div class="row my-3">
            @forelse ($boots as $b)
                <div class="col-12 col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $b->boot }}</h5>
                            <p class="card-text">Dibuat oleh: {{ $b->user->nama }}</p>
                            <a href="{{ url('boot') . '/' . $b->id }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center py-5 my-5">Anda belum memiliki boot apapun</h3>
            @endforelse
        </div>
    </div>
@endsection
