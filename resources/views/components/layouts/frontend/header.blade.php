@if (request()->routeIs('home'))
    <!-- Header Main Area -->
    <header class="site-header header-style-2 pbmit-bg-color-white">
        <div class="pbmit-pre-header-wrapper pbmit-color-blackish">
            <div class="container-fluid p-0">
                <div class="pbmit-pre-header-content d-flex justify-content-between">
                    <div class="pbmit-pre-header-left">
                        <ul class="pbmit-contact-info">
                            <li><i class="pbmit-base-icon-mail-alt"></i><a
                                    href="mailto:{{ config('contact.email') }}">{{ config('contact.email') }}</a>
                            </li>
                            @if (config('contact.address'))
                                <li><i class="pbmit-base-icon-location-dot-solid"></i>{{ config('contact.address') }}
                                </li>
                            @endif
                            @if (config('contact.phone'))
                                <li><i class="pbmit-base-icon-phone-volume-solid-1"></i><a
                                        href="tel:+{{ config('contact.phone') }}">{{ config('contact.phone') }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pbmit-main-header-area">
            <div class="container-fluid p-0">
                <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                    <a href="/">
                        <img class="logo-img" width="250" src="{{ asset(config('assets.logo')) }}" alt="Xleb">
                    </a>
                    <div class="site-navigation">
                        <nav class="main-menu navbar-expand-xl navbar-light">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button class="navbar-toggler" type="button">
                                    <i class="pbmit-base-icon-menu-1"></i>
                                </button>
                            </div>
                            <div class="pbmit-mobile-menu-bg"></div>
                            <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                <div class="pbmit-menu-wrap">
                                    <span class="closepanel">
                                        <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg"
                                            width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
                                            <rect width="36" height="1" transform="translate(0.707) rotate(45)">
                                            </rect>
                                            <rect width="36" height="1"
                                                transform="translate(0 25.456) rotate(-45)">
                                            </rect>
                                        </svg>
                                    </span>
                                    <ul class="navigation clearfix">
                                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                            <a href="/">Home</a>
                                        </li>
                                        <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                            <a href="{{ route('about') }}">About Us</a>
                                        </li>
                                        <li class="{{ request()->routeIs('contact.*') ? 'active' : '' }}">
                                            <a href="{{ route('contact.index') }}">Contact Us</a>
                                        </li>
                                        <li class="{{ request()->routeIs('faq') ? 'active' : '' }}">
                                            <a href="{{ route('faq') }}">Faq</a>
                                        </li>
                                        <li class="{{ request()->routeIs('services') ? 'active' : '' }}">
                                            <a href="{{ route('services') }}">Services</a>
                                        </li>
                                        <li class="{{ request()->routeIs('tracking.*') ? 'active' : '' }}">
                                            <a href="{{ route('tracking.index') }}">Track</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="pbmit-right-box d-flex align-items-center">
                        <div class="pbmit-header-button2">
                            <div id="google_translate_element"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pbmit-slider-area pbmit-slider-two">
            <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false"
                data-columns="1" data-margin="0" data-effect="fade">
                <div class="swiper-wrapper">
                    <!-- Slide1 -->
                    <div class="swiper-slide">
                        <div class="pbmit-slider-item">
                            <div class="pbmit-slider-bg"
                                style="background-image: url(/frontend/images/banner-slider-img/demo-02-slide1.jpg);">
                            </div>
                            <div class="container">
                                <div class="pbmit-slider-content">
                                    <h5 class="pbmit-sub-title transform-delay-1">
                                        <span>Logistic Transportation</span>
                                    </h5>
                                    <h2 class="pbmit-title transform-left transform-delay-2">
                                        <span>Committed to <br> Your Logistics <br> Needs.</span>
                                    </h2>
                                    <div class="pbmit-button">
                                        <div class="transform-bottom transform-delay-3">
                                            <a class="pbmit-btn" href="{{ route('services') }}">
                                                <span class="pbmit-button-content-wrapper">
                                                    <span class="pbmit-button-text">Our Services</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide2 -->
                    <div class="swiper-slide">
                        <div class="pbmit-slider-item">
                            <div class="pbmit-slider-bg"
                                style="background-image: url(/frontend/images/banner-slider-img/demo-02-slide2.jpg);">
                            </div>
                            <div class="container">
                                <div class="pbmit-slider-content">
                                    <h5 class="pbmit-sub-title transform-delay-1">
                                        <span>Logistic Transportation</span>
                                    </h5>
                                    <h2 class="pbmit-title transform-left transform-delay-2">
                                        <span>Get Connected <br> To The World <br> Wide.</span>
                                    </h2>
                                    <div class="pbmit-button">
                                        <div class="transform-bottom transform-delay-3">
                                            <a class="pbmit-btn" href="{{ route('services') }}">
                                                <span class="pbmit-button-content-wrapper">
                                                    <span class="pbmit-button-text">Our Services</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide3 -->
                    <div class="swiper-slide">
                        <div class="pbmit-slider-item">
                            <div class="pbmit-slider-bg"
                                style="background-image: url(/frontend/images/banner-slider-img/demo-02-slide3.jpg);">
                            </div>
                            <div class="container">
                                <div class="pbmit-slider-content">
                                    <h5 class="pbmit-sub-title transform-delay-1">
                                        <span>Logistic Transportation</span>
                                    </h5>
                                    <h2 class="pbmit-title transform-left transform-delay-2">
                                        <span>Moving Your <br> Products All <br> Borders.</span>
                                    </h2>
                                    <div class="pbmit-button">
                                        <div class="transform-bottom transform-delay-3">
                                            <a class="pbmit-btn" href="{{ route('services') }}">
                                                <span class="pbmit-button-content-wrapper">
                                                    <span class="pbmit-button-text">Our Services</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Main Area End Here -->
@endif

@if (!request()->routeIs('home'))
    <!-- Header Main Area -->
    <header class="site-header header-style-1">
        <div class="pbmit-header-overlay">
            <div class="pbmit-main-header-area">
                <div class="container-fluid">
                    <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                        <div class="pbmit-logo-menuarea d-flex justify-content-between align-items-center">
                            <a href="/">
                                <img class="logo-img" width="250" src="{{ asset(config('assets.logo_light')) }}"
                                    alt="Shipex">
                            </a>
                            <div class="site-navigation">
                                <nav class="main-menu navbar-expand-xl navbar-light">
                                    <div class="navbar-header">
                                        <!-- Toggle Button -->
                                        <button class="navbar-toggler" type="button">
                                            <i class="pbmit-base-icon-menu-1"></i>
                                        </button>
                                    </div>
                                    <div class="pbmit-mobile-menu-bg"></div>
                                    <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                        <div class="pbmit-menu-wrap">
                                            <span class="closepanel">
                                                <svg class="qodef-svg--close qodef-m"
                                                    xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163"
                                                    viewBox="0 0 26.163 26.163">
                                                    <rect width="36" height="1"
                                                        transform="translate(0.707) rotate(45)"></rect>
                                                    <rect width="36" height="1"
                                                        transform="translate(0 25.456) rotate(-45)"></rect>
                                                </svg>
                                            </span>
                                            <ul class="navigation clearfix">
                                                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                                    <a href="/">Home</a>
                                                </li>
                                                <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                                    <a href="{{ route('about') }}">About Us</a>
                                                </li>
                                                <li class="{{ request()->routeIs('contact.*') ? 'active' : '' }}">
                                                    <a href="{{ route('contact.index') }}">Contact Us</a>
                                                </li>
                                                <li class="{{ request()->routeIs('faq') ? 'active' : '' }}">
                                                    <a href="{{ route('faq') }}">Faq</a>
                                                </li>
                                                <li class="{{ request()->routeIs('services') ? 'active' : '' }}">
                                                    <a href="{{ route('services') }}">Services</a>
                                                </li>
                                                <li class="{{ request()->routeIs('tracking.*') ? 'active' : '' }}">
                                                    <a href="{{ route('tracking.index') }}">Track</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="pbmit-right-box d-flex align-items-center">
                            <div class="pbmit-header-button2">
                                <div id="google_translate_element"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Title Bar -->
        <div class="pbmit-title-bar-wrapper">
            <div class="container">
                <div class="pbmit-title-bar-content">
                    <div class="pbmit-title-bar-content-inner">
                        <div class="pbmit-tbar">
                            <div class="pbmit-tbar-inner container">
                                <h1 class="pbmit-tbar-title"> {{ $title }}</h1>
                            </div>
                        </div>
                        <div class="pbmit-breadcrumb">
                            <div class="pbmit-breadcrumb-inner">
                                <span>
                                    <a title="{{ config('app.name') }}" href="/"
                                        class="home"><span>{{ config('app.name') }}</span></a>
                                </span>
                                <span class="sep">
                                    <i class="pbmit-base-icon-angle-right"></i>
                                </span>
                                <span><span class="post-root post post-post current-item">
                                        {{ $title }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Title Bar End-->
    </header>
    <!-- Header Main Area End Here -->
@endif
