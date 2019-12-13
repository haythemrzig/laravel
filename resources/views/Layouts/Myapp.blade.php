<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from sporty.wp4life.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2019 17:25:11 GMT -->
<head>
        <title>Homepage</title>
        <!-- META TAGS -->
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable=0,width=device-width,height=device-height,initial-scale=1,maximum-scale=1" />
        <meta name="description" content="">
        <meta name="keywords" content="">
        <!-- CSS FILES -->
        <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('css/normalize.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/colors.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/colorbox.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/easy-responsive-tabs.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/media.css') }}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-- SUB MENU -->

        @include('Layouts.Menu')
        @yield('content')
        @include('Layouts.footer')
            <!-- BACK TO TOP BUTTON -->
            <a href="#" class="back-to-top"></a>
        </section>
        <!-- JS FILES -->
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/backstretch.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.flexslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jflickrfeed.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.colorbox-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/easyResponsiveTabs.js') }}"></script>



        <!-- BG IMAGE -->
        <script type="text/javascript">
            jQuery(window).load(function() {
                "use strict";
                jQuery('body').backstretch("{{ asset('images/photos/bg-blurred.jpg') }}");
            });
        </script>
        <!-- SPONSORS SLIDER -->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#logos').bxSlider({
                    slideWidth: 235,
                    pager: false,
                    minSlides: 2,
                    maxSlides: 5,
                    infiniteLoop: false,
                    hideControlOnEnd: true,
                    slideMargin: 10
                });
            });
        </script>
        <!-- FIXTURE SLIDER -->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                "use strict";
                jQuery('#fixture').bxSlider({
                    pager: false,
                    infiniteLoop: false,
                    hideControlOnEnd: true
                });
            });
        </script>
         <script type="text/javascript">
            jQuery(window).load(function() {
                "use strict";
                jQuery('body').backstretch("{{ asset('images/photos/bg-blurred.jpg') }}");
            });
        </script>
         <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#verticalTab').easyResponsiveTabs({
                    type: 'vertical',
                    width: 'auto',
                    fit: true
                });
            });
        </script>
        <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    </body>


<!-- Mirrored from sporty.wp4life.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2019 17:27:31 GMT -->
</html>
