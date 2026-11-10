<!DOCTYPE html>
<html lang="en">
<head>
    @include('site._partial.metahead')
    @include('site._partial.stylesheet')
    @stack('styles')
    @stack('schema-scripts')
        <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BEYVDM4HGQ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-BEYVDM4HGQ');
    </script>
</head>
<body class="@yield('body_class')">
    @include('site._partial.topbar')
    @include('site._partial.header')

    @yield('content')

    @include('site._partial.footer')
    @include('site._partial.modals')

    <script src="{{ asset('assets/js/data.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/lazy-images.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/notice-popup.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
