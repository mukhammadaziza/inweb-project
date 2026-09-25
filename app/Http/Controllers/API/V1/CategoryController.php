<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\API\V1\Category\CreateCategoryAction;
use App\Actions\API\V1\Category\DeleteCategoryAction;
use App\Actions\API\V1\Category\GetCategoriesAction;
use App\Actions\API\V1\Category\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Categories\DeleteCategoryRequest;
use App\Http\Requests\API\V1\Categories\IndexCategoryRequest;
use App\Http\Requests\API\V1\Categories\ShowCategoryRequest;
use App\Http\Requests\API\V1\Categories\StoreCategoryRequest;
use App\Http\Requests\API\V1\Categories\UpdateCategoryRequest;
use App\Http\Resources\API\V1\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        IndexCategoryRequest $indexCategoryRequest,
        GetCategoriesAction $getCategoriesAction
    ): JsonResponse
    {
        $categories = $getCategoriesAction->execute();

        return CategoryResource::collection($categories)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreCategoryRequest $storeCategoryRequest,
        CreateCategoryAction $createCategoryAction
    ): JsonResponse
    {
        $category = $createCategoryAction->execute($storeCategoryRequest->validated());

        return response()->json([
            'message' => 'Category created successfully',
            'data' => new CategoryResource($category)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(
        ShowCategoryRequest $showCategoryRequest,
        Category $category
    ): JsonResponse
    {
        return new CategoryResource($category)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateCategoryRequest $updateCategoryRequest,
        Category $category,
        UpdateCategoryAction $updateCategoryAction
    ): JsonResponse
    {
        $category = $updateCategoryAction->execute($updateCategoryRequest->validated(), $category);

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => new CategoryResource($category)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        DeleteCategoryRequest $deleteCategoryRequest,
        Category $category,
        DeleteCategoryAction $deleteCategoryAction
    ): JsonResponse
    {
        $deleteCategoryAction->execute($category);

        return response()->json([
            'message' => 'Category deleted successfully'
        ], 200);
    }
}
