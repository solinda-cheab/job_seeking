@php
    $brandName = config('app.name') === 'Laravel' ? 'JobPortal' : config('app.name');
    $logoCandidates = [
        'images/job_sekk_logo.svg',
        'images/job_sekk_logo.png',
        'images/job_sekk_logo.webp',
        'images/job_sekk_logo.jpg',
        'images/jobseek_logo_v0.svg',
        'images/logo.svg',
        'images/logo.png',
        'images/logo.webp',
        'images/logo.jpg',
        'build/assets/jobseek_logo_v0.svg',
        'logo.svg',
        'logo.png',
        'logo.webp',
        'logo.jpg',
    ];

    $logoPath = collect($logoCandidates)->first(fn ($path) => file_exists(public_path($path)));
    $href = $href ?? route('home');
@endphp

<a class="navbar-brand brand-mark" href="{{ $href }}">
    @if ($logoPath)
        <img class="brand-mark__image" src="{{ asset($logoPath) }}" alt="{{ $brandName }} logo">
    @else
        <span class="brand-mark__icon">JP</span>
        <span>{{ $brandName }}</span>
    @endif
</a>
