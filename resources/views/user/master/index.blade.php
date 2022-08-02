<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
 ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Cookie|Open+Sans:400,600,700,800,900|Poppins:300,400,500,600,700|Playfair+Display:400,400i,700,700i,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/user/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/user/style.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="/user/css/swiper.css" type="text/css" />

    <link rel="stylesheet" href="/user/one-page/css/et-line.css" type="text/css" />

    <!-- restaurant Demo Specific Stylesheet -->
    <link rel="stylesheet" href="/user/demos/restaurant/restaurant.css" type="text/css" />
    <link rel="stylesheet" href="/user/demos/restaurant/css/fonts.css" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="/user/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="/user/css/colors.php?color=e7272d" type="text/css" />
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <!-- Document Title
 ============================================= -->
    <title>Ẩm thực 3 miền</title>

</head>

<body class="stretched sticky-footer page-transition"
    data-loader-html="<span class='pizza'> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> <span class='slice'></span> </span>">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper" class="clearfix">
        <!-- Header
  ============================================= -->
        <header id="header" class="transparent-header" data-sticky-shrink="false">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row justify-content-lg-between">

                        <!-- Logo
      ============================================= -->
                        <div id="logo" class="col-auto me-lg-0 order-lg-2">
                            <a href="{{ Route('home') }}" class="standard-logo"><img src="/photos/logo_new.png"
                                    alt="" style="width:194px; height:40px;>" alt="Logo"></a>
                            <a href="{{ Route('home') }}" class="retina-logo"><img src="/photos/logo_new.png"
                                    alt="" style="width:194px; height:40px;>" alt="Logo"></a>
                        </div><!-- #logo end -->

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation
      ============================================= -->
                        <nav class="primary-menu col-lg-4 order-lg-1">

                            <ul class="menu-container">
                                <li class="menu-item"><a class="menu-link" href="{{ Route('home') }}">
                                        <div>Home</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ Route('menu') }}">
                                        <div>Menu</div>
                                    </a></li>
                            </ul>

                        </nav>

                        <nav class="primary-menu col-lg-4 order-lg-3">
                            <ul class="menu-container justify-content-lg-end" style="padding-right: 61px;padding-top: 36px;">
								<li class="menu-item">
                                    <form action="{{ route('Search')}}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input name="keyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                            <button type="submit" class="btn btn-outline-primary"><i class="icon-search"></i></button>
                                          </div>
                                    </form>
                                </li>
								{{-- <li class="menu-item"><a class="menu-link" href="demo-restaurant-blog.html"><div>Blog</div></a></li>
								<li class="menu-item"><a class="menu-link color" href="demo-restaurant-reservation.html"><div>Reservation</div></a></li> --}}
							</ul>
                            <div id="top-account" style="padding-right: 38px;">
                                {{-- @guest
                                <ul class="navbar-nav ml-auto" style="list-style-type: none">
                                <li class="nav-item">
                                    <a href="#modal-register" data-lightbox="inline" ><span class="d-none d-sm-inline-block font-primary fw-medium">Login</span></a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            @endguest --}}

							</div><!-- #top-search end -->

                            <div id="top-cart">
                                <a href="#" id="top-cart-trigger" class="position-relative"><i
                                        class="icon-line-bag"></i></a>
                                <div class="top-cart-content">
                                    <div class="top-cart-title">
                                        <h4>Danh sách món ăn đã chọn</h4>
                                    </div>
                                    <div class="top-cart-action">
                                        <a type="button" class="btn btn-warning"
                                            href="{{ route('cart')}}">Chi tiết</a>
                                    </div>
                                    <div id="change-item-cart">
                                    </div>
                                </div>
                            </div>
                        </nav><!-- #primary-menu end -->

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->
        <!-- Slider
  ============================================= -->
        <section id="slider" class="slider-element swiper_wrapper min-vh-60 min-vh-md-100 include-header"
            data-effect="fade" data-loop="true" data-autoplay="6000" data-speed="1400">
            <div class="slider-inner">

                <div class="swiper-container swiper-parent">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="container dark">
                                <div class="slider-caption">
                                    <div>
                                        <p class="d-none d-sm-block font-primary" data-animate="fadeIn"
                                            data-delay="400">Hãy nấu như nấu cho người mình thương yêu nhất.</p>
                                        <div class="static-content"
                                            style="position: relative; display: flex; justify-content: flex-start; flex-direction: row; margin-top: 30px"
                                            data-animate="fadeIn" data-delay="800">
                                            <img src="/user/demos/restaurant/images/icons/bowl-white.svg"
                                                width="42" height="42" alt="Image">
                                            <img class="leftmargin-sm"
                                                src="/user/demos/restaurant/images/icons/spoon-white.svg"
                                                width="42" height="42" alt="Image">
                                            <img class="leftmargin-sm"
                                                src="/user/demos/restaurant/images/icons/glass-white.svg"
                                                width="42" height="42" alt="Image">
                                            <img class="leftmargin-sm"
                                                src="/user/demos/restaurant/images/icons/wifi-white.svg"
                                                width="42" height="42" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide-bg"
                                style="background-image: url('user/demos/restaurant/images/slider/1.jpg');"></div>
                        </div>

                        <div class="swiper-slide">
                            <div class="container dark">
                                <div class="slider-caption slider-caption-center" style="margin-top: -30px;">
                                    <div>
                                        {{-- <img data-animate="fadeIn" src="/user/demos/restaurant/images/slider-logo.png"
                                            alt="Image" style="width: 120px; margin-bottom: 10px;"> --}}
                                        <p class="d-none d-sm-block font-primary" data-animate="fadeIn"
                                            data-delay="800">Chỉ tan trong miệng, không tan trên tay.</p>
                                        <div class="static-content"
                                            style="position: relative; display: flex; justify-content: center; flex-direction: row; margin-top: 30px"
                                            data-animate="fadeIn" data-delay="1000">
                                            <img src="/user/demos/restaurant/images/icons/bowl-white.svg"
                                                width="42" height="42" alt="Image">
                                            <img class="leftmargin-sm"
                                                src="/user/demos/restaurant/images/icons/spoon-white.svg"
                                                width="42" height="42" alt="Image">
                                            <img class="leftmargin-sm"
                                                src="/user/demos/restaurant/images/icons/glass-white.svg"
                                                width="42" height="42" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide-bg"
                                style="background-image: url('user/demos/restaurant/images/slider/3.jpg');"></div>
                        </div>

                        <div class="swiper-slide">
                            <div class="container dark">
                                <div class="slider-caption slider-caption-right">
                                    <div>
                                        <p class="d-none d-sm-block font-primary" data-animate="fadeIn"
                                            data-delay="400">Thơm ngon đến giọt cuối cùng.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide-bg"
                                style="background-image: url('user/demos/restaurant/images/slider/2.jpg'); background-position: center bottom;">
                            </div>
                        </div>
                    </div>

                    <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
                    <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>

                </div>

            </div>
        </section>
        <!-- Content
  ============================================= -->
        <section id="content">
            @yield('content')
        </section><!-- #content end -->

        <!-- Footer
  ============================================= -->
        <footer id="footer" class="dark"
            style="background: url('user/demos/restaurant/images/footer-bg.jpg')  repeat center center / cover; background-size: auto 100%;; padding: 20px 0 22px">
            <!-- Copyrights
   ============================================= -->
            <div id="copyrights" class="bg-transparent pb-4">
                <div class="container clearfix">

                    <div class="row justify-content-between col-mb-30">
                        <div class="col-12 col-md-auto text-center text-md-start">
                            <span class="font-primary">Copyright &copy; <?php echo date('Y'); ?> Amthuc3mien</span>
                        </div>
                    </div>

                </div>
            </div><!-- #copyrights end -->
        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>

    <!-- JavaScripts
 ============================================= -->
    <script src="/user/js/jquery.js"></script>
    <script src="/user/js/plugins.min.js"></script>

    <!-- Footer Scripts
 ============================================= -->
    <script src="/user/js/functions.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- Custom Carousel JS File -->
    <script>
        var carouselRTL = false;

        if ($('body').hasClass('rtl')) {
            carouselRTL = true;
        }

        $(window).on('pluginCarouselReady', function() {
            $('#food-menu-carousel').owlCarousel({
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                items: 1,
                mouseDrag: false,
                dotsContainer: '#item-thumb',
                rtl: carouselRTL
            });

            $('#dessert-menu-carousel').owlCarousel({
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                items: 1,
                mouseDrag: false,
                dotsContainer: '#item-thumb1',
                rtl: carouselRTL
            });
        });
    </script>

</body>

</html>
