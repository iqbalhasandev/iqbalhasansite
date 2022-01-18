@props(['clients'=>[]])
@if (count($clients)>0)
<section class="section section-dark section-testimony" id="client-area">
    <div class="container">
        <div class="section-head text-center">
            <span>Our Honorable customer</span>
            <h2>Our Client</h2>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="swiper-container swiper-client wow fadeInUp" data-wow-duration="1.5s">
                    <div class="swiper-wrapper ">
                        @foreach ($clients as $c)
                        <div class="swiper-slide single-clients ">
                            <div>
                                <a href="{{ $c->site }}" target="_blank">
                                    <img src="{{ $c->logo_url() }}" alt="{{ $c->name }}" title="{{ $c->name }}"
                                        width="141px">
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>
    </div>
</section>
@endif
