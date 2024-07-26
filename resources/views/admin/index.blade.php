@extends('template.admin')
@section('mainAdmin')
    <div class="container">
        <div class="row my-3">
            <div class="col">
                <h1>Boot yang belum disetujui</h1>
            </div>
        </div>
        <div class="col d-flex flex-wrap gap-3">
            @foreach ($boot as $b)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $b->boot }}</h5>
                        <p class="card-text">Dibuat oleh: {{ $b->user->nama }}</p>
                        <a href="boot/{{ $b->id }}/accept" class="btn btn-primary">Setujui</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
