<!-- Drawer -->
<aside class="app-layout-drawer">

    <!-- Drawer scroll area -->
    <div class="app-layout-drawer-scroll">
        <!-- Drawer logo -->
        <div id="logo" class="drawer-header">
            <a href="/"><img class="img-responsive"
                                      src="{{asset('themes/assets/img/logo/logo-backend.png')}}" title="SADC Parliamentary Forum"
                                      alt="SADC Parliamentary Forum"/></a>
        </div>

        <!-- Drawer navigation -->
        <nav class="drawer-main">
            <ul class="nav nav-drawer">

                <li class="nav-item nav-drawer-header">Apps</li>

                <li class="nav-item">
                    <a href="{{route('parliament.index')}}"><i class="ion-ios-speedometer-outline"></i> {{trans('menu.parliament')}}</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('committee.index')}}"><i class="ion-ios-monitor-outline"></i> {{trans('menu.committees')}}</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('party.index')}}"><i class="ion-ios-calculator-outline"></i> {{trans('menu.political_parties')}}</a>
                </li>

                <li class="nav-item">
                    <a href="{{route('mp.index')}}"><i class="ion-social-javascript-outline"></i> {{trans('menu.mps')}}</a>
                </li>

            </ul>
        </nav>
        <!-- End drawer navigation -->

        <div class="drawer-footer">
            <p class="copyright">{{trans('website.short_title')}}</p>
            <a href="http://www.sadcpf.org" target="_blank" rel="nofollow">{ {{trans('website.title')}} - {{trans('website.sub_title')}}</a>
        </div>
    </div>
    <!-- End drawer scroll area -->
</aside>
<!-- End drawer -->