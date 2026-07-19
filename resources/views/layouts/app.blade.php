<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="app-body" data-theme="{{ auth()->user()->theme_preference ?? 'light' }}">
        @include('layouts.navigation')

        @if (isset($header))
            <section class="page-banner">
                <div class="container">
                    <div class="page-banner__content">
                        {{ $header }}
                    </div>
                </div>
            </section>
        @endif

        <main class="pb-5">
            <div class="container py-4 py-lg-5">
                @if (session('status') === 'appearance-updated')
                    <div class="alert alert-success mb-4">{{ __('Appearance preference updated.') }}</div>
                @endif
                {{ $slot }}
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
