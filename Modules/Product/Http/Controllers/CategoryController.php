<?php

declare(strict_types=1);

namespace Modules\Product\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Http\Controllers\ApiController;
use Modules\Product\Models\Category;
use Modules\Product\Resources\CategoryCollection;
use Modules\Product\Resources\CategoryResource;
use Modules\Product\Services\CategoryService;
use Modules\Product\Validators\CategoryStoreRequest;
use Modules\Product\Validators\CategoryUpdateRequest;

class CategoryController extends ApiController
{

    private $categoryService;

    /**
     * Create a new controller instance.
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {

        //$this->middleware('api');
        $this->categoryService = $categoryService;
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
            $data = $this->categoryService->paginate($limit);

            return $this->sendPaginate(new CategoryCollection($data));

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

            $data = $this->categoryService->all();

            return $this->sendResource(CategoryResource::collection($data));

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

            $storeRequest = new CategoryStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->categoryService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function update(Category $category)
    {
        try {

            $updateRequest = new CategoryUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->categoryService->update(request()->all(), $category);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category): JsonResponse
    {

        try {

            return $this->sendResource(new CategoryResource($category));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function delete(Category $category): JsonResponse
    {

        try {

            $item = $this->categoryService->find($category);

            return $this->sendResource(new CategoryResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
