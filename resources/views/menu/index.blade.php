@extends('template.layouts')

@section('main')
    @include('components.hero')
    @push('style')
        <style>
            .content {
                min-height: 60vh;
                display: flex;
                justify-content: center;
                align-items: center
            }
        </style>
    @endpush
    <div class="container">
        <div class="my-5">
            <h3>Selamat Datang!</h3>
        </div>
        <div class="content">
            @if ($menu != null)
                <h5>Tidak ada menu yang diposting</h5>
            @else
            @endif
        </div>
    </div>
@endsection
