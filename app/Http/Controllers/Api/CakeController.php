<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cake\{StoreCakeRequest, UpdateCakeRequest};
use App\Http\Resources\CakeResource;
use App\Models\Cake;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CakeController extends Controller
{
    public function __construct(
        protected Cake $cake
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        $cakes = $this->cake->cursorPaginate();

        return CakeResource::collection($cakes);
    }

    public function store(StoreCakeRequest $request): CakeResource
    {
        $validatedData = $request->validated();
        $storedCake = $this->cake->create($validatedData);

        return new CakeResource($storedCake);
    }

    public function show(Cake $cake): CakeResource
    {
        return new CakeResource($cake);
    }

    public function update(UpdateCakeRequest $request, Cake $cake): JsonResponse
    {
        $validatedData = $request->validated();

        return response()->json(
            [
                'is_updated' => $cake->update($validatedData)
            ]
        );
    }

    public function destroy(Cake $cake): JsonResponse
    {
        return response()->json(
            [
                'is_deleted' => $cake->delete()
            ]
        );
    }
}
