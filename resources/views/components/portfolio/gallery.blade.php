@props(['gallerys'=>[]])
@if (count($gallerys)>0)
<section class="single-section portfolio-area" id="portfolio-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-head">
                    <span>My Work</span>
                    <h2>My Gallery</h2>
                    <span id="bar"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-0">
                <ul class="list-inline filter-control d-flex justify-content-center" role="group"
                    aria-label="Filter Control">
                    <li class="list-inline-item tab-active" data-group="all">All</li>
                    @foreach ($gallerys as $group=>$gallery)
                    <li class="list-inline-item text-capitalize" data-group="{{ $group }}">{{ $group }}</li>
                    @endforeach
                </ul>
                <div class="shufflejs" id="shufflejs">
                    @foreach ($gallerys as $group=>$gallery)
                    @foreach ($gallery as $g)
                    <div class="js-item col-6 col-lg-4" data-groups='["{{ $group }}"]'>
                        <div class="item-overlay">
                            <img class="img-fluid" alt="Item" src="{{ $g->image_url()}}">
                            <div class="overlay-content">
                                <div class="overlay-icons">
                                    {{-- <p class="overlay-title">{{ $g->caption}}</p> --}}
                                    <a class="popup-item" href="{{ $g->image_url()}}" data-lity>
                                        <i class="icon ion-md-eye"></i>
                                    </a>
                                    <a href="{{ $g->url }}" target="blank">
                                        <i class="icon ion-md-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach


                    <div class="col-6 col-lg-4 sizer-element"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
