<?php

declare(strict_types=1);

namespace Modules\Order\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Modules\Http\Controllers\ApiController;
use Modules\Order\Models\OrderType;
use Modules\Order\Resources\OrderTypeCollection;
use Modules\Order\Resources\OrderTypeResource;
use Modules\Order\Services\OrderTypeService;
use Modules\Order\Validators\OrderTypeStoreRequest;
use Modules\Order\Validators\OrderTypeUpdateRequest;

class OrderTypeController extends ApiController
{

    private $orderTypeService;

    /**
     * Create a new controller instance.
     *
     * @param OrderTypeService $orderTypeService
     */
    public function __construct(OrderTypeService $orderTypeService)
    {

        //$this->middleware('api');
        $this->orderTypeService = $orderTypeService;
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
            $data = $this->orderTypeService->paginate($limit);

            return $this->sendPaginate(new OrderTypeCollection($data));

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

            $data = $this->orderTypeService->all();

            return $this->sendResource(OrderTypeResource::collection($data));

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

            $storeRequest = new OrderTypeStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderTypeService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderType $orderType
     * @return JsonResponse
     */
    public function update(OrderType $orderType)
    {
        try {

            $updateRequest = new OrderTypeUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderTypeService->update(request()->all(), $orderType);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderType $orderType
     * @return JsonResponse
     */
    public function show(OrderType $orderType): JsonResponse
    {

        try {

            return $this->sendResource(new OrderTypeResource($orderType));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderType $orderType
     * @return JsonResponse
     */
    public function delete(OrderType $orderType): JsonResponse
    {

        try {

            $item = $this->orderTypeService->find($orderType);

            return $this->sendResource(new OrderTypeResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
