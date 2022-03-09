@extends('master')
@section('header')
    <meta name="description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر">
    <meta name="keyword" content="کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر">
    <meta name="twitter:card" content="کلینیک زیبایی الماس، دکتر غلام رضا كريمي، تزريق بوتاكس، تزريق فيلر، مزوتراپي، ميكرونيدلينگ، تزريق چربي، پي آر پي، كاشت نخ، خدمات ليزر" />
    <meta name="twitter:title" content="کلینیک زیبایی الماس دکتر غلامرضا کریمی" />
    <meta name="twitter:description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر" />
    <meta itemprop="name" content="کلینیک زیبایی الماس دکتر غلامرضا کریمی">
    <meta itemprop="description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر">
    <meta property="og:url" content="https://almasbeauty.com/" />
    <meta property="og:title" content="کلینیک زیبایی الماس دکتر غلامرضا کریمی"/>
    <meta property="og:description" content="💉کلینیک زیبایی الماس با مدیریت دکتر غلامرضا کریمی خدمات زیبایی شامل تزريق بوتاكس💉 تزريق فيلر💉 مزوتراپي💉 ميكرونيدلينگ💉 تزريق چربي💉 پي آر پي💉 كاشت نخ💉 خدمات ليزر" />
    <meta property="og:url" content="https://almasbeauty.com/" />
    <title>کلینیک زیبایی الماس دکتر غلامرضا کریمی</title>

@endsection
@section('main')
<div class="almas-banner-area pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" style="text-align: center;">
                <div class="almas-banner-text">
                    <h1>کلینیک زیبایی الماس دکتر غلامرضا کریمی</h1>
                    <p>کلینیک تخصصی زیبایی الماس با مدیریت دکتر غلامرضا کریمی <br> جهت مشاوره زیبایی با ما تماس حاصل فرمایید و یا جهت تعیین وقت از طریق لینک زیر به صورت آنلاین نوبت دریافت نمایید .</p>
                    <div class="almas-banner-btn">
                        <a href="{{url('reservation')}}" class="default-btn almas-btn-bg1">نوبت دهی آنلاین</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="almas-img-contant">
                    <div class="almas-banner-img" style="text-align: left">
                        <img  src="{{asset('site/images/almas-img/almas-banner-img1.jpg')}}" title="کلینیک زیبایی دکتر غلامرضا کریمی" alt="کلینیک زیبایی دکتر غلامرضا کریمی">
                    </div>
                    <div class="almas-shape1">
                        <img  src="{{asset('site/images/shape/shape13.png')}}" class="shape-13"  title="کلینیک زیبایی دکتر غلامرضا کریمی" alt="کلینیک زیبایی دکتر غلامرضا کریمی">
                        <img  src="{{asset('site/images/shape/shape15.png')}}" class="shape-15"  title="کلینیک زیبایی دکتر غلامرضا کریمی" alt="کلینیک زیبایی دکتر غلامرضا کریمی">
                    </div>
                </div>
            </div>
        </div>
        <div class="almas-shape2">
            <img src="{{asset('site/images/shape/shape16.png')}}" class="shape-16" alt="کلینیک زیبایی دکتر غلامرضا کریمی">
            <img src="{{asset('site/images/shape/shape16.png')}}" class="shape-same" alt="کلینیک زیبایی دکتر غلامرضا کریمی">
            <img src="{{asset('site/images/shape/shape14.png')}}" class="shape-14" alt="کلینیک زیبایی دکتر غلامرضا کریمی">
        </div>
    </div>
</div>
<div class="case-study-area pt-70 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>خدمات کلینیک زیبایی الماس</h2>
                <p>برای آشنایی با خدمات زیبایی کلینیک الماس بر روی تصاویر کلیک نمایید.</p>
        </div>
        <div class="row">
            @foreach($services as $service)
                <div class="col-lg-4 col-sm-6">
                    <div class="case-study-card">
                        <img  src="{{asset('site/images/logo-white.png')}}" class="lazy" data-src="{{asset($service->images)}}"  title="{{$service->title}}" alt="{{$service->title}}">
                        <div style="padding: 15px 25px; position: absolute; left: 0; top: 40%; width: 100%; text-align: center;background-color: #00000042;">
                        <a href="{{url('services/'.$service->slug)}}"  target="blank">
                            <h3 class="study-text" style="color: #fff;">{{$service->title}}</h3>
                        </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="our-pricing-area pt-70 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>تعرفه پکیج ها</h2>
            <p>با انتخاب یکی از پکیج های کلینیک زیبایی الماس از تخفیفات ویژه ما بهرمند شوید. </p>
        </div>
        <div class="tab pricing-tab">
            <div class="tab-content">
                <div class="tabs-item">
                    <div class="row">
                        @foreach($packages as $package)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="prising-card pric-tabe" style="height: 470px;">
                                <div class="price-header text-center">
                                    <h3>{{$package->title}}</h3>
                                    <h4 class="demo"></h4>
                                </div>
                                <ul>
                                    @if($package->dis1)
                                    <li> <i class="las la-check"></i>
                                        <p style="font-size: 13px;line-height: 2.7;">{{$package->dis1}}</p>
                                    </li>
                                    @endif
                                    @if($package->dis2)
                                    <li>
                                        <i class="las la-check"></i>
                                        <p style="font-size: 13px;line-height: 2.7;">{{$package->dis2}}</p>
                                    </li>
                                    @endif
                                    @if($package->dis3)
                                    <li>
                                        <i class="las la-check"></i>
                                        <p style="font-size: 13px;line-height: 2.7;">{{$package->dis3}}</p>
                                    </li>
                                    @endif
                                    @if($package->dis4)
                                    <li>
                                        <i class="las la-check"></i>
                                        <p style="font-size: 13px;line-height: 2.7;">{{$package->dis4}}</p>
                                    </li>
                                    @endif
                                    @if($package->dis5)
                                    <li>
                                        <i class="las la-check"></i>
                                        <p style="font-size: 13px;line-height: 2.7;">{{$package->dis5}}</p>
                                    </li>
                                    @endif
                                    @if($package->dis6)
                                    <li>
                                        <i class="las la-check"></i>
                                        <p style="font-size: 13px;line-height: 2.7;">{{$package->dis6}}</p>
                                    </li>
                                    @endif
                                </ul>
                                <div class="price-header text-center">
                                    <h6 style="text-decoration: line-through;color: rgba(160,160,160,0.64)">{{number_format($package->price)}} تومان </h6>
                                    <h6>{{number_format($package->offprice)}} تومان </h6>
                                </div>
                                <div class="price-btn text-center">
                                    <a href="{{url('package-service'.'/'.$package->id)}}" class="default-btn bg-color">درخواست</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="choose-us-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="chooses-img-contant">
                    <div class="section-title">
                        <h2>چرا کلینیک زیبایی الماس</h2>
                    </div>
                    <div class="choose-us-img" >
                        <img  src="{{asset('site/images/logo-white.png')}}" class="lazy" data-src="{{asset('site/images/almas-img/choose-us-1.jpg')}}"  title="کلینیک زیبایی دکتر غلامرضا کریمی" alt="کلینیک زیبایی دکتر غلامرضا کریمی">

<!--                        <div class="choose-img">-->
<!--                            <img src="assets/images/almas-img/choose-us-2.png" alt="Image">-->
<!--                        </div>-->
                        <div class="popup-video">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <div class="video-btn video-btn-1">
                                        <a href="https://www.aparat.com/v/KfugT" class="popup-youtube">
                                            <i class="las la-play"></i>
                                            <span class="ripple pinkBg"></span>
                                            <span class="ripple pinkBg"></span>
                                            <span class="ripple pinkBg"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="choose-card-contant">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="choose-card">
                                <i class="las la-sync-alt bg-1"></i>
                                <h3>دکتر متخصص</h3>
                                <p class="text-justify">داشتن دانش، تبحر وتجربه مناسب وکارآمد و به روز جهت شناخت و طراحی پروتکل های درمانی _ زیبایی اولین نیاز کار در زمينه زیبایی است</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="choose-card">
                                <i class="las la-file-archive bg-2"></i>
                                <h3>امکانات و تجهیزات</h3>
                                <p class="text-justify">استفاده از دانش روز و تجهیزات مرتبط در بالاترین سطوح استاندارد آمریکایی(FDA) و اروپایی(CE) شامل : لیزر، مزوگان، میکرونیدل، آراف، سانتریفیوژ و...جهت کسب بهترین نتیجه درمانی در کنار کاربرد مواد مصرفی از بهترین وخوشنام ترین برندها</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="choose-card">
                                <i class="las la-bullseye bg-3"></i>
                                <h3>تجربه ورضایتمندی</h3>
                                <p class="text-justify">۲۵سال سابقه طبابت وحدود ۲۰ سال فعالیت علمی و عملی در حیطه استتیک متضمن تجربه مناسب در شناخت نیازها و طراحی روش‌های درمانی درخور بیماران و در نتیجه کسب درصد بالایی از رضایتمندی ایشان می باشد</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="choose-card">
                                <i class="las la-search-plus bg-4"></i>
                                <h3>مشاوره قبل و بعد از عمل</h3>
                                <p class="text-justify">در مشاوره قبل عمل طی ارزیابی دقیق نیازهای زیبایی مشخص، اولویت بندی و با توجه به خواسته زیباجو نسبت به اجرا اقدام شده و در هر مرحله با پیگیری روند درمانی نسبت به تکمیل پروتکل طراحی شده اولیه قدم های مناسب بعدی برداشته می‌شود</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="testimonials-area pt-70 pb-70">
    <div class="container">
        <div class="section-title">
            <h2> دانستنی ها </h2>
            <p>دانستنی هایی از مراقبت های پوست و زیبایی صورت</p>
        </div>
        <div class="testimonials-slider owl-carousel owl-theme">
            @foreach($blogs as $blog)
            <div class="testimonials-slider-item">
                <img  src="{{asset('site/images/logo-white.png')}}" class="lazy we-are-img" style="width: 75px;height: 75px;" data-src="{{asset($blog->image)}}" title="دانستنی های کلینیک زیبایی الماس" alt="دانستنی های کلینیک زیبایی الماس">
                <h3>{{$blog->name}}</h3>
                <p class="text-justify">{{$blog->description}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="choose-us-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>درباره کلینیک زیبایی الماس</h2>
                </div>
                <div class="who-we-are-text">
                    <p class="text-justify">كلينيك زيبايي الماس با دریافت مجوز در سال ١٣٩٨ فعاليت خود را در قالب كلينيك زيبايي پوست و مو به صورت رسمي با مديريت دكتر غلام رضا كريمي آغاز كرد . دكتر غلام رضا كريمي فارغ التحصيل سال ١٣٧٥ مي باشد . شروع فعاليت  در زمينه پوست و زيبايي در سال ١٣٧٩ آغاز گرديد و از سال ٩٦ فعاليت در زمينه  استتيك در تهران شروع كردند كه در  ابتدا در قالب همكاري با ديگر همكاران شكل گرفته است .

                        خدمات زيبايي كلينيك الماس شامل موارد ذيل مي باشد :<br>
                        ١- تزريق بوتاكس<br>
                        ٢- تزريق فيلر<br>
                        ٣- مزوتراپي<br>
                        ٤- ميكرونيدلينگ <br>
                        ٥- تزريق چربي <br>
                        ٦- پي آر پي <br>
                        ٧- كاشت نخ <br>
                        ٨- خدمات ليزر</p>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="who-we-are-img bg-color">
                    <img  src="{{asset('site/images/logo-white.png')}}" class="lazy we-are-img" data-src="{{asset('site/images/almas-img/who-we-are-img.jpg')}}"   title="کلینیک زیبایی دکتر غلامرضا کریمی" alt="کلینیک زیبایی دکتر غلامرضا کریمی">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
