<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MotoristResource;
use App\Http\Requests\Api\MotoristRequest;
use App\Repositories\Api\MotoristRepository;


class MotoristController extends Controller
{
    private $repository_motorist;

    public function __construct(MotoristRepository $motoristRepository) {

        $this->repository_motorist = $motoristRepository;

    }



    public function store (MotoristRequest $request) {

        $motorist = $this->repository_motorist->setCreateMotorist($request->validated());

        if(gettype($motorist) == 'object') {

            return response()->json(['success' => [config('messages.motorist_created')],200]);
        }

        return response()->json(['error' => [config('messages.motorist_not_created')],400]);

    }


}
