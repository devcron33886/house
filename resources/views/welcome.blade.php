@extends('layouts.frontend')
@section('content')
    <main id="main" class="mt-lg-5">
        @include('partials.map-section')
        <!-- ======= Latest Properties Section ======= -->
        <section class="section-property section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="invoice-title">Latest Properties</h2>
                            </div>
                            <div class="title-link">
                                <a href="{{ route('all-properties') }}">All Property
                                    <span class="bi bi-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach($houses as $house)
                        <div class="col-md-4 mt-2">
                            <div class="card card-box-a card-shadow-sm">
                                <div class="img-box-a">
                                    <img src="{{ $house->cover_photo->getUrl('preview') }}" alt=""
                                         class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h4 class="card-title-a">
                                                <a href="/house/{{  $house->id }}">{{ $house->title }}
                                                    <br/> {{ $house->address }}</a>
                                            </h2>
                                        </div>
                                        <div class="card-body card-body-a">
                                            <div class="row justify-content-center d-flex ml-auto mr-auto">
                                                <a href="/house/{{  $house->id }}" class="btn btn-info ml-auto mr-auto">
                                                    Rwf {{ $house->price }}
                                                </a>
                                                <a href="/house/{{  $house->id }}" class="btn btn-primary ml-auto mr-auto">View Details
                                                    <span class="bi bi-chevron-right"></span>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                               
                                                <li>
                                                    <h4 class="card-info-title">Beds</h4>
                                                    <span>{{ $house->bedrooms }}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Baths</h4>
                                                    <span>{{ $house->bathrooms }}</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Floors</h4>
                                                    <span>{{ $house->floors }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Latest Properties Section -->
    </main><!-- End #main -->
@endsection
@section('scripts')
    <script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&region=GB'></script>
    <script defer>
        function initialize() {
            var mapOptions = {
                zoom: 12,
                minZoom: 6,
                maxZoom: 17,
                zoomControl:true,
                zoomControlOptions: {
                    style:google.maps.ZoomControlStyle.DEFAULT
                },
                center: new google.maps.LatLng({{ $latitude }}, {{ $longitude }}),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                panControl:false,
                mapTypeControl:false,
                scaleControl:false,
                overviewMapControl:false,
                rotateControl:false
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            var image = new google.maps.MarkerImage("images/pin.png", null, null, null, new google.maps.Size(40,52));
            var houses = @json($mapHouses);
            for(house in houses)
            {
                house = houses[house];
                if(house.latitude && house.longitude)
                {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(house.latitude, house.longitude),
                        icon:image,
                        map: map,
                        title: house.title
                    });
                    var infowindow = new google.maps.InfoWindow();
                    google.maps.event.addListener(marker, 'click', (function (marker, house) {
                        return function () {
                            infowindow.setContent(generateContent(house))
                            infowindow.open(map, marker);
                        }
                    })(marker, house));
                }
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
        function generateContent(house)
        {
            var content = `
            <div class="card card-box-a card-shadow-sm">
                                <div class="img-box-a">
                                    <img src="`+house.cover_photo+`" alt=""
                                         class="img-a img-fluid">
                                </div>
                                <div class="card-overlay">
                                    <div class="card-overlay-a-content">
                                        <div class="card-header-a">
                                            <h4 class="card-title-a">
                                                <a href="{{ route('house', '') }}/`+house.id+`">
                                                    `+house.title+`
                                                <br/>`+house.address+`</a>
                                                    
                                            </h2>
                                        </div>
                                        <div class="card-body card-body-a">
                                            <div class="row justify-content-center d-flex ml-auto mr-auto">
                                                <a href="{{ route('house', '') }}/`+house.id+`" class="btn btn-info ml-auto mr-auto">
                                                    Rwf `+house.price+`
                                                </a>
                                                <a href="{{ route('house', '') }}/`+house.id+`" class="btn btn-primary ml-auto mr-auto">View Details
                                                    <span class="bi bi-chevron-right"></span>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="card-footer-a">
                                            <ul class="card-info d-flex justify-content-around">
                                               
                                                <li>
                                                    <h4 class="card-info-title">Beds</h4>
                                                    <span>`+house.bedrooms+`</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Baths</h4>
                                                    <span>`+house.bathrooms+`</span>
                                                </li>
                                                <li>
                                                    <h4 class="card-info-title">Floors</h4>
                                                    <span>`+house.floors+`</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            
            
            return content;
        }
    </script>
@endsection

