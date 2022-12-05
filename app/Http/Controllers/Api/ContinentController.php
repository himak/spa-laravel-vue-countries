<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContinentResource;
use App\Models\Continent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ContinentResource
     */
    public function index(): ContinentResource
    {
        return new ContinentResource(Continent::all());
    }
}
