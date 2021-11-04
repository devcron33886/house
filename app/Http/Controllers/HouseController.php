<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Models\House;
use App\Http\Resources\HouseResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::with(['categories', 'infrastructures'])
            ->searchResults()

            ->paginate(12);
        return new HouseResource(House::with(['categories'])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHouseRequest $request)
    {
        $house = House::create($request->all());

        return (new HouseResource($house))
        ->response()
        ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        return new HouseResource($house->load(['category', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHouseRequest $request, House $house)
    {
        $house->update($request->all());
        return (new HouseResource($house))
        ->response()
        ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $house->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
