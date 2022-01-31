<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" data-scroll href="{{ route('portfolio') }}">
            <x-logo />
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="nav-btn">Menu</span>
        </button>
        <div class="d-flex flex-row  order-0 order-lg-1">
            <div class="navbar-nav flex-row">
                <button id="navBtn" class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div id="navbarSupportedContent" class="collapse navbar-collapse order-1 order-lg-0">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#header-area">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-area">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#resume-area">Resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services-area">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio-area">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials-area">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-area">Contact</a>
                </li>
                <li class="nav-item">
                    @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    @else
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @endguest
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar">
            <button id="sidebarBtn" class="hamburger hamburger--slider is-active" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <div class="about-me">
                <img class="img-fluid img-thumbnail d-block mx-auto avatar"
                    src="{{ portfolio_setting('about_us.mobile_menu_image')?storage_asset(portfolio_setting('about_us.mobile_menu_image')):portfolio_asset('img/sidebar-avatar.jpg') }}"
                    alt="About me">
                <address>
                    <ul class="list-unstyled">
                        @if (portfolio_setting('about_us.name'))
                        <li>
                            <span>Name</span>
                            <p>{{ portfolio_setting('about_us.name') }}</p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.curriculum_vita'))
                        <li>
                            <span>Curriculum Vita</span>
                            <p><a href="{{ storage_asset(portfolio_setting('about_us.curriculum_vita')) }}">Download
                                    CV</a></p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.skills'))
                        <li>
                            <span>Skills</span>
                            <p>{{ portfolio_setting('about_us.skills') }}</p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.email'))
                        <li>
                            <span>Email</span>
                            <p><a href="mailto:{{ portfolio_setting('about_us.email') }}">{{
                                    portfolio_setting('about_us.email') }}</a>
                            </p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.address'))
                        <li>
                            <span>Address</span>
                            <p>{{ portfolio_setting('about_us.address') }}</p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.age'))
                        <li>
                            <span>Age</span>
                            <p>{{ portfolio_setting('about_us.age') }}</p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.birth_date'))
                        <li>
                            <span>Date of Birth</span>
                            <p>{{ portfolio_setting('about_us.birth_date') }}</p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.phone'))
                        <li>
                            <span>Phone</span>
                            <p><a href="tel:{{ portfolio_setting('about_us.phone') }}">{{
                                    portfolio_setting('about_us.phone') }}</a>
                            </p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.residence'))
                        <li>
                            <span>Residence</span>
                            <p>{{ portfolio_setting('about_us.residence') }}</p>
                        </li>
                        @endif
                        @if (portfolio_setting('about_us.freelance_status'))
                        <li>
                            <span>Freelance Status</span>
                            <p>{{ portfolio_setting('about_us.freelance_status') }}</p>
                        </li>
                        @endif
                    </ul>
                </address>
                <div class="social-medias">

                    @if (setting('social.twitter'))
                    <a href="{{ setting('social.twitter') }}" target="_blank">
                        <i class="icon ion-logo-twitter"></i>
                    </a>
                    @endif
                    @if (setting('social.instagram'))
                    <a href="{{ setting('social.instagram') }}" target="_blank">
                        <i class="icon ion-logo-instagram"></i>
                    </a>
                    @endif
                    @if (setting('social.linkedin'))
                    <a href="{{ setting('social.linkedin') }}" target="_blank">
                        <i class="icon ion-logo-linkedin"></i>
                    </a>
                    @endif
                    @if (setting('social.youtube'))
                    <a href="{{ setting('social.youtube') }}" target="_blank">
                        <i class="icon ion-logo-youtube"></i>
                    </a>
                    @endif
                    @if (setting('social.github'))
                    <a href="{{ setting('social.github') }}" target="_blank">
                        <i class="icon ion-logo-github"></i>
                    </a>
                    @endif
                    @if (setting('social.facebook'))
                    <a href="{{ setting('social.facebook') }}" target="_blank">
                        <i class="icon ion-logo-facebook"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
<!--=====================================================
            ------------------Navbar Area ENd-----------------
        ========================================================-->
