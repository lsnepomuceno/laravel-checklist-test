<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Interest\StoreInterestRequest;
use App\Http\Requests\Interest\UpdateInterestRequest;
use App\Http\Resources\CakeResource;
use App\Http\Resources\InterestResource;
use App\Models\{Cake, Interest};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InterestController extends Controller
{
    public function __construct(
        protected Cake     $cake,
        protected Interest $interest
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        $cakes = $this->cake->with('interests')->cursorPaginate();

        return CakeResource::collection($cakes);
    }

    public function store(StoreInterestRequest $request): InterestResource
    {
        $validatedData = $request->validated();
        $storedInterest = $this->interest->create($validatedData)?->load('cake');
        $storedInterest->cake()->decrement('amount');

        return new InterestResource($storedInterest);
    }

    public function show(Interest $interest): InterestResource
    {
        return new InterestResource($interest->load('cake'));
    }

    public function update(UpdateInterestRequest $request, Interest $interest): JsonResponse
    {
        $validatedData = $request->validated();

        if ($interest->cake_id !== $validatedData['cake_id']) {
            $interest->cake()->increment('amount');
            $this->cake->find($validatedData['cake_id'])
                       ->decrement('amount');
        }

        return response()->json(
            [
                'is_updated' => $interest->update($validatedData)
            ]
        );
    }

    public function destroy(Interest $interest): JsonResponse
    {
        return response()->json(
            [
                'is_deleted' => $interest->delete()
            ]
        );
    }
}
