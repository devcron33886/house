@extends('layouts.frontend')
@section('content')
    <div id="main">
        <div class="container col-md-11 mt-2">

            {{-- owners Listing --}}
            <div class="text-black text-center">LIST OF OWNERS AND THEIR RATINGS</div>
            <div class="row justify-content-center pt-3 mt-3">

                @foreach ($owners as $owner)
                    <div class="col-md-4">
                        <div class="card card-widget widget-user-2">
                            <div class="widget-user-header bg-warning">
                                <div class="widget-user-image">
                                    @if($owner->profile_image)
                                        <img class="img-circle elevation-2"
                                             src="{{ $owner->profile_image->getUrl('preview') }}" alt="User Avatar">
                                    @endif
                                </div>

                                <h3 class="widget-user-username">{{ $owner->name }}</h3>
                                <h5 class="widget-user-desc">@foreach($owner->roles as $key => $roles)
                                        {{ $roles->title }}</h5>@endforeach
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Contact <span class="float-right">{{ $owner->mobile }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Rates <span class="float-right badge bg-info">5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Total post <span class="float-right badge bg-success">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Followers <span class="float-right badge bg-danger">842</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
