<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $title }} &mdash; {{ config('app.name') }}</title>
        <meta content="{{ config('meta.keywords') }}" name="keywords">
        <meta content="{{ config('meta.description') }}" name="description">
        <meta property="og:title" content="{{ config('app.name') }} - {{ config('meta.slogan') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ asset(config('assets.og_image')) }}" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset(config('assets.favicon')) }}">
        <!-- CSS
         ============================================ -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
        <!-- Fontawesome -->
        <link rel="stylesheet" href="/frontend/css/fontawesome.css">
        <!-- Flaticon -->
        <link rel="stylesheet" href="/frontend/css/flaticon.css">
        <!-- Base Icons -->
        <link rel="stylesheet" href="/frontend/css/pbminfotech-base-icons.css">
        <!-- Themify Icons -->
        <link rel="stylesheet" href="/frontend/css/themify-icons.css">
        <!-- Slick -->
        <link rel="stylesheet" href="/frontend/css/swiper.min.css">
        <!-- Magnific -->
        <link rel="stylesheet" href="/frontend/css/magnific-popup.css">
        <!-- AOS -->
        <link rel="stylesheet" href="/frontend/css/aos.css">
        <!-- Shortcode CSS -->
        <link rel="stylesheet" href="/frontend/css/shortcode.css">
        <!-- Base CSS -->
        <link rel="stylesheet" href="/frontend/css/base.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="/frontend/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="/frontend/css/responsive.css">

        <x-partials.google-translator />

    </head>

    <body>

        <!-- page wrapper -->
        <div class="page-wrapper" id="page">

            <x-layouts.frontend.header />

            <!-- Page Content -->
            <div class="page-content">

                <x-partials.sweet-alert />

                {{ $slot }}

            </div>
            <!-- Page Content End -->

            <x-layouts.frontend.footer />

        </div>
        <!-- page wrapper End -->

        <!-- Scroll To Top -->
        <div class="pbmit-backtotop">
            <div class="pbmit-arrow">
                <i class="pbmit-base-icon-plane"></i>
            </div>
            <div class="pbmit-hover-arrow">
                <i class="pbmit-base-icon-plane"></i>
            </div>
        </div>
        <!-- Scroll To Top End -->

        <!-- JS
  ============================================ -->
        <!-- jQuery JS -->
        <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="/frontend/js/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="/frontend/js/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="/frontend/js/bootstrap.min.js"></script>
        <!-- jquery Waypoints JS -->
        <script src="/frontend/js/jquery.waypoints.min.js"></script>
        <!-- jquery Appear JS -->
        <script src="/frontend/js/jquery.appear.js"></script>
        <!-- Numinate JS -->
        <script src="/frontend/js/numinate.min.js"></script>
        <!-- Slick JS -->
        <script src="/frontend/js/swiper.min.js"></script>
        <!-- Magnific JS -->
        <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
        <!-- Circle Progress JS -->
        <script src="/frontend/js/circle-progress.js"></script>
        <!-- countdown JS -->
        <script src="/frontend/js/jquery.countdown.min.js"></script>
        <!-- AOS -->
        <script src="/frontend/js/aos.js"></script>
        <!-- GSAP -->
        <script src='/frontend/js/gsap.js'></script>
        <!-- Scroll Trigger -->
        <script src='/frontend/js/ScrollTrigger.js'></script>
        <!-- Split Text -->
        <script src='/frontend/js/SplitText.js'></script>
        <!-- Theia Sticky Sidebar JS -->
        <script src='/frontend/js/theia-sticky-sidebar.js'></script>
        <!-- GSAP Animation -->
        <script src='/frontend/js/gsap-animation.js'></script>
        <!-- Scripts JS -->
        <script src="/frontend/js/scripts.js"></script>

        <script>
            (function() {
                function c() {
                    var b = a.contentDocument || a.contentWindow.document;
                    if (b) {
                        var d = b.createElement('script');
                        d.innerHTML =
                            "window.__CF$cv$params={r:'97eb1f8a9ee1a8b9',t:'MTc1NzgwMjk4NC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../cdn-cgi/challenge-platform/h/g/scripts/jsd/f78657f80e4b/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";
                        b.getElementsByTagName('head')[0].appendChild(d)
                    }
                }
                if (document.body) {
                    var a = document.createElement('iframe');
                    a.height = 1;
                    a.width = 1;
                    a.style.position = 'absolute';
                    a.style.top = 0;
                    a.style.left = 0;
                    a.style.border = 'none';
                    a.style.visibility = 'hidden';
                    document.body.appendChild(a);
                    if ('loading' !== document.readyState) c();
                    else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                    else {
                        var e = document.onreadystatechange || function() {};
                        document.onreadystatechange = function(b) {
                            e(b);
                            'loading' !== document.readyState && (document.onreadystatechange = e, c())
                        }
                    }
                }
            })();
        </script>
        <script defer
            src="https://static.cloudflareinsights.com/beacon.min./frontend/js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
            integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
            data-cf-beacon='{"rayId":"97eb1f8a9ee1a8b9","version":"2025.8.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"125856bf84ab44059737e93b01aa0fef","b":1}'
            crossorigin="anonymous"></script>
        <x-partials.live-chat />
    </body>

</html>
