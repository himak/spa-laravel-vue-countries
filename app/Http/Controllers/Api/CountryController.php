<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContryRequest;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CountryCollection
     */
    public function index(): CountryCollection
    {
        return new CountryCollection(Country::query()->with('continent')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContryRequest $request
     * @return CountryResource
     */
    public function store(StoreContryRequest $request): CountryResource
    {
        $country = Country::query()->create($request->validated());

        return new CountryResource($country);
    }

    /**
     * Display the specified resource.
     *
     * @param int $country_id
     * @return CountryResource
     */
    public function show(int $country_id): CountryResource
    {
        return new CountryResource(Country::with('continent')->findOrFail($country_id));
    }
}
