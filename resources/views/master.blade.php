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
    <link rel="icon" type="images/png" href="{{asset('site/images/favicon.png')}}">
    <meta name="ahrefs-site-verification" content="abfb467b50f7408c06e4937eaa760a8bbb8000ae898cdacd4760b68123c4d157">
    @yield('header')
</head>
<body data-spy="scroll" data-offset="70">


<nav class="navbar fixed-top navbar-expand-md main-navbar almas-nav" style="background-color: #313030;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('site/images/logo.png')}}" alt="کلینیک زیبایی الماس دکتر غلامرضا کریمی">
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
            <div class="nav-btn" style="margin: 10px">
                <a href="tel:+989102205889" id="phonenumber" class="btn btn-secondary">مشاوره : 09102205889</a>
            </div>
            @if(! Auth::check())
            <div class="nav-btn">
                <a href="{{url('login')}}" class="btn btn-secondary">ورود/عضویت</a>
            </div>
                @elseif(Auth::check())
                <div class="nav-btn" style="color: #fff;margin: 0 10px;">
                    <a href="{{url('logout')}}">{{auth::user()->name}} عزیز</a>

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
                        <img src="{{asset('site/images/logo-white.png')}}" alt="کلینیک زیبایی الماس دکتر غلامرضا کریمی">
                    </div>
                    <p>كلينيك زيبايي الماس با دریافت مجوز در سال ١٣٩٨ فعاليت خود را در قالب كلينيك زيبايي پوست و مو به صورت رسمي با مديريت دكتر غلام رضا كريمي آغاز كرد .</p>
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
                            <h3 class="title">کلینیک زیبایی الماس</h3>
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
                            <h3 class="title">خدمات کلینیک الماس</h3>
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
                    <h3 class="title">آدرس </h3>
                    <div class="footer-image">
                        <p>چهار راه جهان كودك - كوچه صانعي - پلاك ٧ طبقه اول - واحد ٤ - كلينيك زيبايي الماس نقره اي</p>
                        <a href="tel:+989102205889" class="btn btn-secondary">شماره تماس : 09102205889</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <p>طراحی شده توسط آژانس تبلیغاتی <a href="https://bestagroup.ir">بستا</a></p>
        </div>
    </div>
</footer>
<div class="call-whatsapp" style="
        display: inline;
        bottom: 50px;
        left: 30px;
        position: fixed;
        z-index: 99999999;">
    <div class="bg-whatsapp" style="background-color: #be00f8;
    border-radius: 15px;
    padding: 3px 12px;">

        <a href="tel:+989102205889" style="color: #fff;">
            تماس باما
        </a>
    </div>

</div>
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
                    "legalName" : "کلینیک زیبایی الماس دکتر غلامرضا کریمی",
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
