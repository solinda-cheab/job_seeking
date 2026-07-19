@php
    $brandName = config('app.name') === 'Laravel' ? 'JobPortal' : config('app.name');
    $metaTitle = filled($title ?? null) ? trim($title).' | '.$brandName : $brandName;
    $metaDescription = $description ?? 'A modern Bootstrap-powered job portal for candidates and hiring teams.';
@endphp
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{ $metaDescription }}">

<title>{{ $metaTitle }}</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])
@stack('head')
