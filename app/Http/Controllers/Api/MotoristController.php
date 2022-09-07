<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\MotoristRequest;
use App\Http\Requests\Api\VerifyProfileMotoristRequest;

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

            return response()->json(['success' => [config('messages.created_success')]], 200);
        }

        return response()->json(['error' => [config('messages.not_created')]], 400);

    }

    public function verifyProfileMotorist(VerifyProfileMotoristRequest $request) {
        //$validated = $request->validated();

        return response()->json(['success' => [config('messages.validated_profile_motorist')]],200);

    }


}
