<!DOCTYPE html>

<html class="app-ui">

<head>
    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <!-- Document title -->
    <title>SADC PF - Login | Diversity Form</title>

    <meta name="description" content="SADC Parliamentary Forum - Diversity Form"/>
    <meta name="robots" content="noindex, nofollow"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('themes/assets/img/favicons/apple-touch-icon.png')}}"/>
    <link rel="icon" href="{{asset('themes/assets/img/favicons/favicon.ico')}}"/>

    <!-- Google fonts -->
    <link rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400"/>

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="{{asset('themes/assets/css/font-awesome.css')}}"/>
    <link rel="stylesheet" id="css-ionicons" href="{{asset('themes/assets/css/ionicons.css')}}"/>
    <link rel="stylesheet" id="css-bootstrap" href="{{asset('themes/assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" id="css-app" href="{{asset('themes/assets/css/app.css')}}"/>
    <link rel="stylesheet" id="css-app-custom" href="{{asset('themes/assets/css/app-custom.css')}}"/>
    <!-- End Stylesheets -->

    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('google-captcha', {
                'sitekey' : '6LeHwK0UAAAAAEU1DOQcRGUfRy83hb3tfDGhyLUx'
            });
        };
    </script>

</head>

<body class="app-ui">
<div class="app-layout-canvas">
    <div class="app-layout-container">

        <main class="app-layout-content">

            <!-- Page header -->
            <div class="page-header bg-green bg-inverse">
                <div class="container">
                    <!-- Section Content -->
                    <div class="p-y-lg text-center">
                        <h1 class="display-2">SADC Parliamentary Forum</h1>
                        <p class="text-muted">Diversity Form</p>
                    </div>
                    <!-- End Section Content -->
                </div>
            </div>
            <!-- End Page header -->

            <!-- Page content -->
            <div class="page-content">
                <div class="container">
                    <div class="row">


                        @yield('content')

                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- End page content -->

            <!-- Modal -->
            <div class="modal" id="modal-signup-terms" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card-header bg-blue bg-inverse">
                            <h4>Terms &amp; Conditions</h4>
                            <ul class="card-actions">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-block">
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet
                                adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut
                                metus lobortis tortor tincidunt himenaeos habitant
                                quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius
                                lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet
                                adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut
                                metus lobortis tortor tincidunt himenaeos habitant
                                quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius
                                lorem sit metus mi.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-sm btn-app" type="button" data-dismiss="modal"><i
                                        class="ion-checkmark"></i> Ok
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End modal -->

        </main>

        <footer class="app-layout-footer">
            <div class="container p-y-md">
                <div class="pull-right hidden-sm hidden-xs">
                    <a href="http://www.sadcpf.org" target="_blank" rel="nofollow">SADC Parliamentary Forum</a>
                </div>
                <div class="pull-left text-center text-md-left">
                    SADC PF &copy; <span class="js-year-copy"></span>
                </div>
            </div>
        </footer>

    </div>
    <!-- .app-layout-container -->
</div>
<!-- .app-layout-canvas -->


<!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
<script src="{{asset('themes/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('themes/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('themes/assets/js/core/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('themes/assets/js/core/jquery.scrollLock.min.js')}}"></script>
<script src="{{asset('themes/assets/js/core/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('themes/assets/js/app.js')}}"></script>
<script src="{{asset('themes/assets/js/app-custom.js')}}"></script>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer/>


</body>

</html>