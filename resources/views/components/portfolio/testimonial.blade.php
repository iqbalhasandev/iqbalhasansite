@props(['testimonials'=>[]])
<!--=====================================================
        -------------  Testimonials Area Start-------------
     ========================================================-->
@if (count($testimonials)>0)


<section class="section section-dark section-testimony" id="testimonials-area">
    <div class="container">
        <div class="section-head text-center">
            <span>Kind Words</span>
            <h2 class="text-capitilize">Testimonial</h2>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="swiper-container swiper-testimony wow fadeInUp" data-wow-duration="1.5s">

                    <div class="swiper-wrapper ">
                        @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide single-testimonials ">
                            <div class="single-testimonials-in text-center p-4 b-box mx-auto">
                                <img src="{{  $testimonial->image_url()}}" alt="" class="mx-auto b-box" width="90px">
                                <p class="pt-2 mt-4 text-center">"{{ $testimonial->quote }}"</p>
                                <span class="font-weight-bold mt-3 d-block">- {{ $testimonial->name }}</span>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <!-- <div class="testimony-nav">
                    <a href="#" class="swiper-button-next"></a>
                        <a href="#" class="swiper-button-prev"></a>
                    </div> -->

            </div>
        </div>
    </div>
</section>
@endif
<!--=====================================================
        -------------  Testimonials Area End-------------
     ========================================================-->
