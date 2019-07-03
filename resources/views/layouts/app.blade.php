@include('shared.top')

<body class="app-ui layout-has-drawer layout-has-fixed-header">
<div class="app-layout-canvas">
    <div class="app-layout-container">

        @include('shared.side_menu')

       @include('shared.header')

        <main class="app-layout-content">

            <!-- Page Content -->
            <div class="container-fluid p-y-md">
                @yield('content')
            </div>
            <!-- End Page Content -->

        </main>

    </div>
    <!-- .app-layout-container -->
</div>
<!-- .app-layout-canvas -->
@include('shared.footer')