<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head', [
            'title' => trim($__env->yieldContent('page_title')) ?: null,
            'description' => trim($__env->yieldContent('page_description')) ?: null,
        ])
    </head>
    
    <body class="marketing-body">
        @include('layouts.partials.public-nav')

        <main>
            @yield('content')
        </main>

        @include('layouts.partials.public-footer')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
