@include('admin._partial.metahead')

<body data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light"
    data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>
    <div id="wrapper">
        @include('admin._partial.top-bar')
        @include('admin._partial.nav')
        <div class="content-page">
            @yield('content')
            @include('admin._partial.footer')
        </div>
    </div>
    @include('admin._partial.scripts')
    @stack('footer-scripts')
</body>

</html>