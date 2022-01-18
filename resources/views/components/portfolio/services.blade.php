@props(['services'=>[]])
@if (count($services)>0)

<section class="section section-dark section-services" id="services-area">
    <div class="container">
        <div class="section-head">
            <span>WHAT I DO</span>
            <h2>My Services</h2>
            <span id="bar"></span>
        </div>

        <div class="row mt-4">
            @foreach ($services as $service)
            <div class="col-sm-6 col-md-4">
                <div class="services-flip wow fadeInUp" data-wow-duration="1.5s">
                    <div class="services-list">
                        <div class="services-list-front services-list-1"
                            style=" background-image: url('{{ $service->image_url() }}');">
                            <div class="flip-content">
                                <h5 class="mb-0">{{ $service->title }}</h5>
                            </div>
                        </div>
                        <div class="services-list-back">
                            <div class="flip-content">
                                <div class="services-list-icon">
                                    <i class="fas fa-paint-brush  "></i>
                                </div>
                                <div class="mt-4">
                                    <h5 class="mb-0">{{ $service->title }}</h5>
                                    <p class=" mt-3">{{ $service->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
