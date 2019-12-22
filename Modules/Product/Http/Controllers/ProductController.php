<?php

declare(strict_types=1);

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Modules\Http\Controllers\ApiController;
use Modules\Product\Models\Product;
use Modules\Product\Resources\ProductCollection;
use Modules\Product\Resources\ProductResource;
use Modules\Product\Services\ProductService;
use Modules\Product\Validators\ProductStoreRequest;
use Modules\Product\Validators\ProductUpdateRequest;

class ProductController extends ApiController
{

    private $productService;

    /**
     * Create a new controller instance.
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {

        //$this->middleware('api');
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {

        try {

            $limit = (int)(request('limit') ?? 20);
            $data = $this->productService->paginate($limit);

            return $this->sendPaginate(new ProductCollection($data));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {

        try {

            $data = $this->productService->all();

            return $this->sendResource(ProductResource::collection($data));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);
        }
    }

    /**
     * Display a listing of choices.
     *
     * @return JsonResponse
     */
    public function listOfChoices(): JsonResponse
    {

        try {

            $data = $this->categoryService->listOfChoices();

            return $this->sendSimpleJson($data);

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return JsonResponse
     */
    public function store()
    {

        try {

            $storeRequest = new ProductStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->productService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function update(Product $product)
    {
        try {

            $updateRequest = new ProductUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->productService->update(request()->all(), $product);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {

        try {

            return $this->sendResource(new ProductResource($product));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function delete(Product $product): JsonResponse
    {

        try {

            $item = $this->productService->find($product);

            return $this->sendResource(new ProductResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
