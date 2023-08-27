<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Front page</title>

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" />

    {{-- direct files on public folders --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <link rel="stylesheet" href="{{ asset('responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('print.css') }}" media="print">
  </head>

    <body>
    
        <header class="header">
            <section class="header-top">
                <div class="container">
                    <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="contact">
                        <p>
                            <span class="phone"><a href="#">Phone: +1023546789</a></span
                            ><span class="email"
                            ><a href="#">Email: proashik012@gmail.com</a></span
                            >
                        </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="join-us">
                        <p><a href="#">JOIN US NOW</a></p>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <section class="header-bottom">
                <div class="container">
                    <div class="logo-menu">
                        <div class="logo">
                            <a href="{{ URL::to('/') }}">
                                <img src="{{ asset('img/main-logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="menu">
                            <ul>
                                <li><a href="{{ URL::to('/') }}">Home</a></li>
                                <li><a href="{{ route('frontend-page-about') }}">About</a></li>
                                <li><a href="{{ route('frontend-page-campaign') }}">Campaigns</a></li>
                                <li><a href="{{ route('frontend-page-events') }}">Events</a></li>
                                <li><a href="{{ route('frontend-page-contact') }}">Contact</a></li>
                                <li>
                                    @auth
                                        <a href="#"  onclick="event.preventDefault(); document.getElementById('front-logout-form').submit();">Logout</a>
                                    @endauth
                                    
                                    @guest
                                    <a href="{{ route('login') }}">Login</a>
                                    @endguest

                                    <form id="front-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <!-- end of Header -->

        <section class="content mb-5 @php echo request()->is('/') ? '' : ''; @endphp">

            @yield('content')

        </section>

        <!-- start Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                    <div class="footer-charity-text">
                        <h2>HELP NEEDY</h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris
                        </p>
                        <hr />
                        <p>
                        <a href="#"
                            ><i class="fa fa-facebook" aria-hidden="true"></i></a
                        ><a href="#"
                            ><i class="fa fa-twitter" aria-hidden="true"></i></a
                        ><a href="#"
                            ><i class="fa fa-behance" aria-hidden="true"></i></a
                        ><a href="#"
                            ><i class="fa fa-dribbble" aria-hidden="true"></i
                        ></a>
                        </p>
                    </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="footer-text one">
                                    <h3>RECENT POST</h3>
                                    <ul>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">keyboard_arrow_right</i>
                                        Consectetur Adipisicing Elit</a
                                        >
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">keyboard_arrow_right</i>
                                        Consectetur Adipisicing
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">keyboard_arrow_right</i>
                                        Consectetur Adipisicing Elit</a
                                        >
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">keyboard_arrow_right</i>
                                        Consectetur Adipisicing</a
                                        >
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">keyboard_arrow_right</i>
                                        Consectetur Adipisicing Elit</a
                                        >
                                    </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <div class="footer-text two">
                                    <h3>USEFUL LINKS</h3>
                                    <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Causes</a></li>
                                    <li><a href="#">Event</a></li>
                                    <li><a href="#">Blog</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="footer-text one">
                                    <h3>CONTACT US</h3>
                                    <ul>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">location_on</i>Uttara,
                                        Dhaka-1230</a
                                        >
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">email</i
                                        >proashik012@gmail.com</a
                                        >
                                    </li>
                                    <li>
                                        <a href="#"
                                        ><i class="material-icons">call</i>+123456789</a
                                        >
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_bottom">
            <p>
                Copyright @ 2023 <a href="#">Help Needy</a> | All Rights Reserved
            </p>
            </div>
        </footer>

        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('js/animationCounter.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/active.js') }}"></script>
        <script src="{{ asset('js/customjs.js') }}"></script>
    </body>
</html>
<!-- end of Footer -->
