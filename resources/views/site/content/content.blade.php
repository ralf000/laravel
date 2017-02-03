@if(isset($pages) && is_object($pages))

    @foreach($pages as $key => $page)

        @if($key % 2 === 0)

            <!--Hero_Section-->
            @include('site.content.home')
            <!--Hero_Section-->

        @else

            <!--Aboutus-->
            @include('site.content.about_us')
            <!--Aboutus-->

        @endif

    @endforeach

@endif

<!--Service-->
@if(isset($services) && is_object($services))
    @include('site.content.services')
@endif
<!--Service-->

<!-- Portfolio -->
@if(isset($filters) && is_object($filters) && isset($portfolio) && is_object($portfolio))
    @include('site.content.portfolio')
@endif
<!--/Portfolio -->


<!--client_logos-->
@if(isset($clients) && is_object($clients))
    @include('site.content.clients')
@endif
<!--/client_logos-->

<!--Team-->
@if(isset($employees) && is_object($employees))
    @include('site.content.employees')
@endif
<!--/Team-->