@extends('layouts.frontend')
@section('content')
    <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">

                        <h4 class="title-single">All properties</h4>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->

        <!-- ======= Property Grid ======= -->
        <section class="property-grid grid">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="grid-option">
                            <form>
                                <label>
                                    Sort By
                                    <select class="custom-select">
                                        <option selected>All</option>
                                        <option value="1">New to Old</option>
                                        <option value="2">For Rent</option>
                                        <option value="3">For Sale</option>
                                    </select>
                                </label>
                            </form>
                        </div>
                    </div>
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
                <div class="row">
                    <div class="col-sm-12">
                        <nav class="pagination-a">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <span class="bi bi-chevron-left"></span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item next">
                                    <a class="page-link" href="#">
                                        <span class="bi bi-chevron-right"></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Property Grid Single-->

    </main><!-- End #main -->
@endsection
