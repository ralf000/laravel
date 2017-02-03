<section id="service">
    <div class="container">
        <h2>Services</h2>
        <div class="service_wrapper">
            @foreach(array_chunk($services->toArray(), 3) as $key => $servicesGroup)
                <div class="row {{ ($key !== 0) ? 'borderTop' : '' }}">
                    @foreach($servicesGroup as $key2 => $service)
                        <div class="col-lg-4 {{ ($key2 !== 0) ? 'borderLeft' : '' }} {{ ($key !== 0)  ? 'mrgTop' : '' }}">
                            <div class="service_block">
                                <div class="service_icon delay-03s animated wow  zoomIn"><span><i
                                                class="fa {{ $service['icon'] }}"></i></span></div>
                                <h3 class="animated fadeInUp wow">{{ $service['title'] }}</h3>
                                <p class="animated fadeInDown wow">{!! $service['text'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>