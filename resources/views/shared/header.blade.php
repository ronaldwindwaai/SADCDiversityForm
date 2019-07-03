<!-- Header -->
<header class="app-layout-header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#header-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout"
                        data-action="sidebar_toggle">
                    <span class="sr-only">Toggle drawer</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="header-navbar-collapse">


                <ul id="main-menu" class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">English <span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">French</a></li>
                            <li><a href="javascript:void(0)">German</a></li>
                            <li><a href="javascript:void(0)">Italian</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- .navbar-left -->

                <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">


                    <li class="dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="ion-ios-bell"></i> <span
                                    class="badge">3</span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-header">Profile</li>
                            <li>
                                <a tabindex="-1" href="javascript:void(0)"><span
                                            class="badge pull-right">3</span> News </a>
                            </li>
                            <li>
                                <a tabindex="-1" href="javascript:void(0)"><span
                                            class="badge pull-right">1</span> Messages </a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-header">More</li>
                            <li>
                                <a tabindex="-1" href="javascript:void(0)">Edit Profile..</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-profile">
                        <a href="javascript:void(0)" data-toggle="dropdown">
                            <span class="m-r-sm">{{Auth::user()->full_name}} <span class="caret"></span></span>
                            <img class="img-avatar img-avatar-48"
                                 src="{{asset('themes/assets/img/avatars/avatar3.jpg')}}"
                                 alt="User profile pic"/>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-header">
                                Pages
                            </li>
                            <li>
                                <a href="base_pages_profile.html">Profile</a>
                            </li>

                            <li>
                                <form name="form_logout" method="post" action="{{route('logout')}}">
                                    <a href="#" onclick="document.form_logout.submit();">Logout</a>
                                </form>

                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- .navbar-right -->
            </div>
        </div>
        <!-- .container-fluid -->
    </nav>
    <!-- .navbar-default -->
</header>
<!-- End header -->