<section class="section section-about" id="about-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-md-6">
                <div class="section-about--img wow fadeInUp">
                    <img class="img-fluid mx-auto d-block"
                        src="{{ portfolio_setting('about_us.image')?storage_asset(portfolio_setting('about_us.image')):portfolio_asset('img/about-img.jpg') }}"
                        alt="About Picture">
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-desc">
                    <div class="about-desc-content text-left">
                        <div class="position-relative">
                            <h2>About Me</h2>
                            <span id="bar" style="left: 0;right: auto;"></span>
                        </div>
                        <p class="mt-4 font-weight-light">{{ portfolio_setting('about_us.details') }}</p>
                    </div>

                    <ul class="about-desc-social text-left my-4 list-unstyled list-inline">
                        @if (setting('social.facebook'))
                        <li class="list-inline-item">
                            <a class="hover-state facebook" href="{{ setting('social.facebook') }}" target="_blank">
                                <i class="icon ion-logo-facebook"></i>
                            </a>
                        </li>
                        @endif
                        @if (setting('social.github'))
                        <li class="list-inline-item">
                            <a class="hover-state github" href="{{ setting('social.github') }}" target="_blank">
                                <i class="icon ion-logo-github"></i>
                            </a>
                        </li>
                        @endif
                        @if (setting('social.youtube'))
                        <li class="list-inline-item">
                            <a class="hover-state youtube" href="{{ setting('social.youtube') }}" target="_blank">
                                <i class="icon ion-logo-youtube"></i>

                            </a>
                        </li>
                        @endif
                        @if (setting('social.linkedin'))
                        <li class="list-inline-item">
                            <a class="hover-state linkedin" href="{{ setting('social.linkedin') }}" target="_blank">
                                <i class="icon ion-logo-linkedin"></i>

                            </a>
                        </li>
                        @endif
                        @if (setting('social.twitter'))
                        <li class="list-inline-item">
                            <a class="hover-state twitter" href="{{ setting('social.twitter') }}" target="_blank">
                                <i class="icon ion-logo-twitter"></i>

                            </a>
                        </li>
                        @endif
                    </ul>

                    <div class="about-desc-more text-left">
                        <div class="row">
                            @if (portfolio_setting('about_us.age'))
                            <div class="col-lg-6">
                                <div class="about-desc-info">
                                    <b>Age : </b>
                                    <span>{{ portfolio_setting('about_us.age') }}</span>
                                </div>
                            </div>
                            @endif
                            @if ( portfolio_setting('about_us.address'))
                            <div class="col-lg-6">
                                <div class="about-desc-info">
                                    <b>Location : </b>
                                    <span>{{ portfolio_setting('about_us.address') }}</span>
                                </div>
                            </div>
                            @endif
                            @if (portfolio_setting('about_us.degree'))
                            <div class="col-lg-6">
                                <div class="about-desc-info">
                                    <b>Degree : </b>
                                    <span>{{ portfolio_setting('about_us.degree') }}</span>
                                </div>
                            </div>
                            @endif
                            @if (setting('social.skype'))
                            <div class="col-lg-6">
                                <div class="about-desc-info">
                                    <b>Skype : </b>
                                    {{ setting('social.skype') }}
                                </div>
                            </div>
                            @endif
                            @if (portfolio_setting('about_us.phone'))
                            <div class="col-lg-6">
                                <div class="about-desc-info">
                                    <b>Phone : </b>
                                    <a href="tel:{{ portfolio_setting('about_us.phone') }}">{{
                                        portfolio_setting('about_us.phone') }}</a>
                                </div>
                            </div>
                            @endif
                            @if (portfolio_setting('about_us.email'))
                            <div class="col-lg-6">
                                <div class="about-desc-info">
                                    <b>Mail : </b>
                                    <a href="mailto:{{ portfolio_setting('about_us.email') }}">{{
                                        portfolio_setting('about_us.email') }}</a>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-12">
                                @if (portfolio_setting('about_us.button'))
                                <?php $key=0; ?>
                                @foreach (json_decode(portfolio_setting('about_us.button')) as $display_title=>$url)

                                @if ($key==0)
                                <a class="btn button-scheme my-1 text-white" href="{{ $url }}" role="button">{{
                                    $display_title }}</a>
                                @else
                                <a href="{{ $url }}" class="btn button-outline details my-1 text-white">{{
                                    $display_title }}</a>
                                @endif
                                <?php $key++; ?>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
