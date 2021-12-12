<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Category;
use App\Models\House;
use App\Models\Role;
use App\Models\User;
use App\Models\Infrastructure;
use App\Models\Subscriber;
use App\Models\Booking;
use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $houses = House::with(['categories', 'infrastructures','created_by'])
            ->orderBy('created_at','DESC')
            ->where('house_status',1)
            ->searchResults()

            ->paginate(12);

        $mapHouses = $houses->makeHidden(['available', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'cover_photo', 'media']);
        $latitude = $houses->count() && (request()->filled('category') || request()->filled('search')) ? $houses->average('latitude') : -1.9440727;
        $longitude = $houses->count() && (request()->filled('category') || request()->filled('search')) ? $houses->average('longitude') : 30.0618851;

        //dd($mapHouses);
        return view('welcome',compact('mapHouses','latitude','longitude','categories','houses'));
    }



    public function house(House $house)
    {
        $categories = Category::all();
        $house->load(['categories','infrastructures','created_by']) ;
        return view('house',compact('house','categories'));
    }

    public function booking(BookingRequest $request)
    {
        $data = array_merge($request->validated(), ['status' => 'processing']);
        $booking=Booking::create($data);
        return redirect()->back()->withStatus('Your house request is sent and is currently being processed');
    }

    public function listing()
    {

        return view('list');
    }

    public function owners()
    {

        $owners = User::whereHas('roles',function ($q){
            return $q->where('title','User');
        })->get();
        return view('owners',compact('owners'));

    }

}
