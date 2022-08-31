<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\MotoristRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MotoristResource;
use App\Repositories\MotoristRepository;

class MotoristController extends Controller
{
    private $repository_motorist;

    public function __construct(MotoristRepository $motoristRepository) {

        $this->repository_motorist = $motoristRepository;

    }



    public function store (MotoristRequest $request) {

        $motorist = $this->repository_motorist->setCreateMotorist($request->validated());

        if(gettype($motorist) == 'object') {

            return new MotoristResource($motorist);
        }

        return response()->json(['error' => [config('messages.taxi_not_created')]]);

    }


}
