<?php

namespace App\Http\Controllers;

use App\Http\Requests\House\GetHousesRequest;
use App\Http\Resources\House\HouseResource;
use App\Repositories\HouseRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class HouseController extends Controller
{
    public function __construct(protected readonly HouseRepository $houseRepository)
    {}

    public function index(GetHousesRequest $request): AnonymousResourceCollection
    {
        return HouseResource::collection($this->houseRepository->getAll($request->validated()));
    }
}
