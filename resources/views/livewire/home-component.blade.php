<div>
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-2 mt-2">
                    <input type="text" class="form-control" wire:model.debounce.350ms="search" placeholder="search">
                </div>
                <div class="col-md-2 mt-2">
                    <select wire:model="perPage" class="form-control">
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="36">36</option>
                    </select>
                </div>
                <div class="col-md-2 mt-2">
                    <select wire:model="selectedDistrict" class="form-control">
                        <option value="" selected>Choose District</option>
                        @foreach($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mt-2">
                    @if (!is_null($selectedDistrict))
                        <select wire:model="selectedSector" class="form-control">
                            <option value="" selected>Choose Sector</option>
                            @foreach($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="col-md-2 mt-2">
                    @if (!is_null($selectedSector))
                        <select wire:model="selectedCell" class="form-control">
                            <option value="" selected>Choose Cell</option>
                            @foreach($cells as $cell)
                                <option value="{{ $cell->id }}">{{ $cell->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
        <div class="container">
            <div class="row justify-content-center">

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
                                        </h4>
                                    </div>
                                    <div class="card-body card-body-a">
                                        <div class="row justify-content-center d-flex ml-auto mr-auto">
                                            <a href="/house/{{  $house->id }}" class="btn btn-info ml-auto mr-auto">
                                                Rwf {{ $house->price }}
                                            </a>
                                            <a href="/house/{{  $house->id }}" class="btn btn-primary ml-auto mr-auto">View
                                                Details
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
                            {{ $houses->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Property Grid Single-->

</div>
