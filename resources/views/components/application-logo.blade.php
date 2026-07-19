@php
    $brandName = config('app.name') === 'Laravel' ? 'JobPortal' : config('app.name');
@endphp

<img src="{{ asset('images/job_sekk_logo.svg') }}" alt="{{ $brandName }} logo" {{ $attributes }}>
