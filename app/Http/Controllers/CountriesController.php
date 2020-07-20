<?php

namespace App\Http\Controllers;

use App\CountryHelper;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\GetCountriesRequest;
use App\Jobs\UpdateCountriesStatistic;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountriesController extends Controller
{
    /**
     * Get all countries action
     *
     * @param GetCountriesRequest $request
     *
     * @return JsonResponse
     */
    public function index(GetCountriesRequest $request)
    {
        return response()->json(CountryHelper::all(), 200);
    }

    /**
     * Create new country entry
     *
     * @param CreateCountryRequest $request
     *
     * @return JsonResponse
     */
    public function create(CreateCountryRequest $request)
    {
        UpdateCountriesStatistic::dispatch($request->validated());
        return response()->json([], 201);
    }

}
