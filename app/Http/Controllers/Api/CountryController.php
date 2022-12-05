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
        $orderColumn = request('order_column', 'name');
        if (!in_array($orderColumn, ['code', 'name'])) {
            $orderColumn = 'name';
        }

        $orderDirection = request('order_direction', 'asc');
        if (!in_array($orderDirection, ['asc', 'desc'])) {
            $orderDirection = 'asc';
        }

        $countries = Country::with('continent')
            ->orderBy($orderColumn, $orderDirection)
            ->paginate(10)->withQueryString();

        return new CountryCollection($countries);
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
