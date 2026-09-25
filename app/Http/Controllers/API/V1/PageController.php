<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\API\V1\Page\CreatePageAction;
use App\Actions\API\V1\Page\DeletePageAction;
use App\Actions\API\V1\Page\GetPagesAction;
use App\Actions\API\V1\Page\UpdatePageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Pages\DeletePageRequest;
use App\Http\Requests\API\V1\Pages\StorePageRequest;
use App\Http\Requests\API\V1\Pages\UpdatePageRequest;
use App\Http\Resources\API\V1\PageResource;
use App\Models\Page;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        GetPagesAction $getPagesAction
    ): JsonResponse
    {
        $pages = $getPagesAction->execute();

        return PageResource::collection($pages)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StorePageRequest $storePageRequest,
        CreatePageAction $createPageAction
    ): JsonResponse
    {
        $page = $createPageAction->execute($storePageRequest->validated());

        return response()->json([
            'message' => 'Page created successfully',
            'data' => new PageResource($page)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Page $page
    ): JsonResponse
    {
        return new PageResource($page)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdatePageRequest $updatePageRequest, 
        Page $page,
        UpdatePageAction $updatePageAction
    ): JsonResponse
    {
        $page = $updatePageAction->execute($updatePageRequest->validated(), $page);

        return response()->json([
            'message' => 'Page updated successfully',
            'data' => new PageResource($page)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        DeletePageRequest $deletePageRequest,
        Page $page,
        DeletePageAction $deletePageAction
    ): JsonResponse
    {
        $deletePageAction->execute($page);

        return response()->json([
            'message' => 'Page deleted successfully'
        ], 200);
    }
}
