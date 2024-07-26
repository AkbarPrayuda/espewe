@push('style')
    <style>
        .bg-cover1 {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://smkpertiwikng.sch.id/wp-content/uploads/2023/05/DSCF8207-1536x864.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 75vh;
        }
    </style>
@endpush

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div
            class="carousel-item active bg-cover1 d-flex flex-column justify-content-center align-items-center text-white">
            @if (session()->has('error'))
                @include('components.alert.error')
            @endif
            <h1>Selamat datang di</h1>
            <h2>Web SPW</h2>
            <h3>SMK Pertiwi Kuningan</h3>
        </div>
    </div>
</div>
