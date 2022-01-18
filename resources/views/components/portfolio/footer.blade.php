<footer class="footer-area single-section">
    <div class="container">
        <div class="row main-footer">
            <div class="col-12 col-md-3">
                <h5 class="column-title">About</h5>
                <ul class="list-unstyled column-content">
                    <li><a data-scroll href="#header-area">Home</a></li>
                    <li><a data-scroll href="#services-area">My Services</a></li>
                    <li><a data-scroll href="#portfolio-area">Portfolio</a></li>
                    <li><a href="#0">Contact Me</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3">
                <h5 class="column-title">Information</h5>
                <ul class="list-unstyled column-content">
                    <li><a href="#0">Terms & Condition</a></li>
                    <li><a href="#0">Privacy Policy</a></li>
                    <li><a href="#0">FAQs</a></li>
                    <li><a href="#0">Report an issue</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3">
                <h5 class="column-title text-center">Sponsor</h5>
                <a href="https://namecheap.pxf.io/P0zjez" target="_blank">
                    <img class="img-fluid" src="{{ portfolio_asset('img/sponsor/namecheap.png') }}"
                        style="width: 200px;">
                </a>
                <br><br>
                <a href="https://github.com/iqbalhasandev" target="_blank">
                    <img class="img-fluid" src="{{ portfolio_asset('img/sponsor/github.png') }}" style="width: 200px;">
                </a>
            </div>
            <div class="col-12 col-md-3">
                <h2 class="brand-logo">
                    <img class="img-fluid" src="{{ setting('site.logo')?storage_asset(setting('site.logo')):'' }}"
                        style="width: 220px;">
                </h2>
                <p class="brand-description">{{ portfolio_setting('about_us.details') }}</p>
            </div>
        </div>
        <div class="row mini-footer">
            <div class="social-medias">
                @if (setting('social.twitter'))
                <a class="twitter" href="{{ setting('social.twitter') }}" target="_blank">
                    <i class="icon ion-logo-twitter"></i>
                </a>
                @endif
                @if (setting('social.instagram')))
                <a class="instagram" href="{{ setting('social.instagram') }}" target="_blank">
                    <i class="icon ion-logo-instagram"></i>
                </a>
                @endif
                @if (setting('social.linkedin')))
                <a class="linkedin" href="{{ setting('social.linkedin') }}" target="_blank">
                    <i class="icon ion-logo-linkedin"></i>
                </a>
                @endif
                @if (setting('social.youtube')))
                <a class="youtube" href="{{ setting('social.youtube') }}" target="_blank">
                    <i class="icon ion-logo-youtube"></i>
                </a>
                @endif
                @if (setting('social.github')))
                <a class="github" href="{{ setting('social.github') }}" target="_blank">
                    <i class="icon ion-logo-github"></i>
                </a>
                @endif
                @if (setting('social.facebook')))
                <a class="facebook" href="{{ setting('social.facebook') }}" target="_blank">
                    <i class="icon ion-logo-facebook"></i>
                </a>
                @endif

            </div>
            <p class="copyright-notice text-capitalize">Copyright © {{ date('Y') }} <a href="{{ config('app.url') }}"
                    target="_blank">IQBAL HASAN</a> reserved.</p>
        </div>
    </div>
</footer>
