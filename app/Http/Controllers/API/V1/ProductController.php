<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\API\V1\Product\CreateProductAction;
use App\Actions\API\V1\Product\DeleteProductAction;
use App\Actions\API\V1\Product\GetProductsAction;
use App\Actions\API\V1\Product\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Products\DeleteProductRequest;
use App\Http\Requests\API\V1\Products\IndexProductRequest;
use App\Http\Requests\API\V1\Products\ShowProductRequest;
use App\Http\Requests\API\V1\Products\StoreProductRequest;
use App\Http\Requests\API\V1\Products\UpdateProductRequest;
use App\Http\Resources\API\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        IndexProductRequest $indexProductRequest,
        GetProductsAction $getProductsAction
    ): JsonResponse
    {
        $products = $getProductsAction->execute();

        return ProductResource::collection($products)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreProductRequest $storeProductRequest,
        CreateProductAction $createProductAction
    ): JsonResponse
    {
        $product = $createProductAction->execute($storeProductRequest->validated());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => new ProductResource($product)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(
        ShowProductRequest $showProductRequest,
        Product $product
    ): JsonResponse
    {
        return new ProductResource($product)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateProductRequest $updateProductRequest,
        Product $product,
        UpdateProductAction $updateProductAction
    ): JsonResponse
    {
        $product = $updateProductAction->execute($updateProductRequest->validated(), $product);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        DeleteProductRequest $deleteProductRequest,
        Product $product,
        DeleteProductAction $deleteProductAction
    ): JsonResponse
    {
        $deleteProductAction->execute($product);

        return response()->json([
            'message' => 'Product deleted successfully'
        ], 200);
    }
}
