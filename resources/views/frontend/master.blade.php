


<!DOCTYPE html>
<html lang="zxx">
@php
$seting=DB::table('settings')->first();  
@endphp

<!-- Mirrored from technext.github.io/malefashion/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Apr 2022 10:45:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p><marquee>Online Day Care Centre</marquee></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                
                                @guest
                                <a href="{{route('register')}}" target="_blank">Sign Up</a>
                                <a href="{{route('login')}}" target="_blank">Sign in</a>
                                <a href="{{route('admin.login')}}" target="_blank">Admin Login</a>
                                
                                @else
                                <a class="nav-link scrollto" href="{{ route('profile') }}">Profile</a>
                                
                                    <a class="getstarted scrollto" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @endguest
                            </div>
                            <div class="header__top__hover">
                                <span>BDT </span>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="{{ url('/home') }}"><img style="height: 30px; width:150px;" src="{{asset($seting->image)}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ url('/home') }}">Home</a></li>
                            
                            <li><a href="#">Day Cares</a>
                                <ul class="dropdown">
                                    @foreach($categorys as $cat)
                                    <li><a href="{{route('category_wise_show',$cat->id)}}">{{ $cat->categoty_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{asset('frontend/')}}/img/icon/search.png" alt=""></a>
                        <a href="#"><img src="{{asset('frontend/')}}/img/icon/heart.png" alt=""></a>
                        <a href="{{route('cart_show')}}"><img src="{{asset('frontend/')}}/img/icon/cart.png" alt=""> <span></span></a>
                       
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img style="height: 30px; width:150px;" src="{{asset($seting->image)}}" alt=""></a>
                        </div>
                        <p>{{$seting->detail}}</p>
                        <a href="#"><img src="{{asset('frontend/')}}/img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>{{$seting->detail}}</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Puspika Puja</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{asset('frontend/')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('frontend/')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend/')}}/js/jquery.nice-select.min.js"></script>
    <script src="j{{asset('frontend/')}}/s/jquery.nicescroll.min.js"></script>
    <script src="{{asset('frontend/')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frontend/')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('frontend/')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('frontend/')}}/js/mixitup.min.js"></script>
    <script src="{{asset('frontend/')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend/')}}/js/main.js"></script>
</body>


<!-- Mirrored from technext.github.io/malefashion/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Apr 2022 10:45:53 GMT -->
</html>