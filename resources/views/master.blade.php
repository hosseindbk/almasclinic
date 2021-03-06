<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/rtl.css')}}">
    <link rel="icon" type="images/png" href="{{asset('site/images/logo.png')}}">
    <link rel="canonical" href="{{URL::current()}}" />
    <script> !function (t, e, n) { t.yektanetAnalyticsObject = n, t[n] = t[n] || function () { t[n].q.push(arguments) }, t[n].q = t[n].q || []; var a = new Date, r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(), c = e.getElementsByTagName("script")[0], s = e.createElement("script"); s.id = "ua-script-I1LoHPvk"; s.dataset.analyticsobject = n; s.async = 1; s.type = "text/javascript"; s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/I1LoHPvk/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c) }(window, document, "yektanet"); </script>
    <meta name="ahrefs-site-verification" content="abfb467b50f7408c06e4937eaa760a8bbb8000ae898cdacd4760b68123c4d157">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WBT7ZQV');</script>
    <!-- End Google Tag Manager -->
    @yield('header')
</head>
<body data-spy="scroll" data-offset="70">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBT7ZQV"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<nav class="navbar fixed-top navbar-expand-md main-navbar almas-nav" style="background-color: #313030;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('site/images/logo.png')}}" alt="???????????? ???????????? ?????????? ???????? ?????????????? ??????????">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link @if(Request::is($menu->slug)) active @endif" href="{{url($menu->slug)}}">{{$menu->title}}</a>
                    </li>
                @endforeach
            </ul>
            @if(! Auth::check())
                <div class="nav-btn">
                    <a href="{{url('login')}}" class="btn btn-secondary">????????/??????????</a>
                </div>
            @elseif(Auth::check())
                <div class="nav-btn" style="color: #fff;margin: 0 10px;">
                    <a href="{{url('logout')}}">{{auth::user()->name}} ????????</a>

                </div>
            @endif

        </div>
    </div>
</nav>


@yield('main')

<footer class="footer-area pt-70 bor-radius-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-widget">
                    <div class="logo">
                        <img src="{{asset('site/images/logo-white.png')}}" alt="???????????? ???????????? ?????????? ???????? ?????????????? ??????????">
                    </div>
                    <p>???????????? ???????????? ?????????? ???? ???????????? ???????? ???? ?????? ???????? ???????????? ?????? ???? ???? ???????? ???????????? ???????????? ???????? ?? ???? ???? ???????? ???????? ???? ???????????? ???????? ???????? ?????? ?????????? ???????? ?????? .</p>
                    <ul class="footer-social">
                        <li>
                            <a class="bg-1" href="#" target="_blank">
                                <i class="lab la-facebook-f bg-1"></i>
                            </a>
                        </li>
                        <li>
                            <a class="bg-2" href="#" target="_blank">
                                <i class="lab la-twitter bg-2"></i>
                            </a>
                        </li>
                        <li>
                            <a class="bg-3" href="#" target="_blank">
                                <i class="lab la-linkedin-in bg-3"></i>
                            </a>
                        </li>
                        <li>
                            <a class="bg-4" href="https://www.instagram.com/dr.karimi.reza" target="_blank">
                                <i class="lab la-instagram bg-4"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="title">???????????? ???????????? ??????????</h3>
                            <ul class="footer-text">
                                @foreach($menus as $menu)
                                    <li>
                                        <a href="{{url($menu->slug)}}">
                                            <i class="las la-angle-left"></i>
                                            {{$menu->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="title">?????????? ???????????? ??????????</h3>
                            <ul class="footer-text">
                                @foreach($service_link as $service)
                                    <li>
                                        <a href="{{url('services/'.$service->slug)}}">
                                            <i class="las la-angle-left"></i>
                                            {{$service->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 offset-sm-4 offset-lg-0">
                <div class="footer-widget">
                    <h3 class="title">???????? </h3>
                    <div class="footer-image">
                        <p>???????? ?????? ???????? ???????? - ???????? ?????????? - ???????? ?? ???????? ?????? - ???????? ?? - ???????????? ???????????? ?????????? ???????? ????</p>
                        <a href="tel:+989102205889" class="btn btn-secondary">?????????? ???????? : 09102205889</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <p>?????????? ?????? ???????? ?????????? ???????????????? <a href="https://bestagroup.ir">????????</a></p>
        </div>
    </div>
</footer>
<div class="call-whatsapp" style="display: inline;bottom: 150px;left: 30px;position: fixed;z-index: 99999999;">
    <div class="bg-whatsapp" style="background-color: #be00f8;border-radius: 15px;padding: 3px 12px;">
        <a href="tel:+989102205889" style="color: #fff;">
            ???????? ????????
        </a>
    </div>
    <br>
    <div class="bg-whatsapp" style="background-color: #be00f8;border-radius: 15px;padding: 3px 12px;">
        <a href="{{url('reservation')}}" style="color: #fff;">
            ???????? ????????????
        </a>
    </div>
</div>
<div class="call-banner d-none d-sm-block" style="display: inline;bottom: 25%;right: 0px;position: fixed;z-index: 99999999;">
    <div id="ads-right-top" class="bg-banner ads-right-top-open">
        <div style="background-color: #f6f4ff;cursor: pointer;color: #000;font-size: 1.2rem;text-align: center;width: 50px;">
            <a id="close-right-top" >????????</a>
        </div>
        @foreach($ads as $ad)
            @if($ad->position == 2)
                <a href="{{url($ad->url)}}">
                    <img src="{{asset($ad->image)}}" style="width: 200px" alt="">
                </a>
            @endif
        @endforeach
    </div>
    <br>
</div>

@foreach($ads as $ad)
    @if($ad->position == 1)
            <div id="ads-bottom" class="ads-bottom-open">
                <div class="col-12" style="padding: 6px;cursor: pointer;color: #000;z-index: 1;">
                    <a id="close-bottom" style="background-color: #fff;padding: 5px 10px;margin-right: 50%;">
                        X
                    </a>
                </div>
                <a href="{{url($ad->url)}}">
                    <div class="col-12" style="text-align: center"><img src="{{asset($ad->image)}}" alt="" style="height: 70px"></div>
                </a>
            </div>
    @endif
@endforeach
<script src="{{asset('site/js/jquery.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('site/js/wow.min.js')}}"></script>
<script src="{{asset('site/js/odometer.min.js')}}"></script>
<script src="{{asset('site/js/jquery.appear.js')}}"></script>
<script src="{{asset('site/js/form-validator.min.js')}}"></script>
<script src="{{asset('site/js/contact-form-script.js')}}"></script>
<script src="{{asset('site/js/persianumber.js')}}"></script>
<script src="{{asset('site/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('site/js/custom.js')}}"></script>
<script>
    $("#close-bottom").click(function() {
        $('#ads-bottom').removeClass('ads-bottom-open');
        $('#ads-bottom').addClass('ads-bottom-close');
    });
    $("#close-right-top").click(function() {
        $('#ads-right-top').removeClass('ads-right-top-open');
        $('#ads-right-top').addClass('ads-right-top-close');
    });
</script>
<script>
    $(document).ready(function(){
        $('.demo').persiaNumber();
    });
</script>
<script>
    $(function () {
        $('#phonenumber').on('click', function () {
            $.ajax({
                url : '{{ route( 'counter' ) }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "ip": "{{Request::ip()}}"
                },
                type: 'post',
                dataType : 'json'
            });
        });
    });
</script>
@yield('script')
<script type="application/ld+json">
                { "@context" : "http://schema.org",
                    "@type" : "clinic",
                    "legalName" : "???????????? ???????????? ?????????? ???????? ?????????????? ??????????",
                    "url" : "https://almasbeauty.com/",
                    "contactPoint" : [{
                        "@type" : "ContactPoint",
                        "telephone" : "+989102205889",
                        "contactType" : "clinic"
                    }],
                    "logo" : "https://almasbeauty.com/site/images/logo.png",
                    "sameAs" : [ "https://www.instagram.com/dr.karimi.reza" ]
                }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages = document.querySelectorAll("img.lazy");
        var lazyloadThrottleTimeout;
        function lazyload () {
            if(lazyloadThrottleTimeout) {
                clearTimeout(lazyloadThrottleTimeout);
            }
            lazyloadThrottleTimeout = setTimeout(function() {
                var scrollTop = window.pageYOffset;
                lazyloadImages.forEach(function(img) {
                    if(img.offsetTop < (window.innerHeight + scrollTop)) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                    }
                });
                if(lazyloadImages.length == 0) {
                    document.removeEventListener("scroll", lazyload);
                    window.removeEventListener("resize", lazyload);
                    window.removeEventListener("orientationChange", lazyload);
                }
            }, 20);
        }
        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
    });
</script>
</body>
</html>
