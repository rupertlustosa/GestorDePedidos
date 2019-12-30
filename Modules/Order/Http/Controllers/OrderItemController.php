<?php

declare(strict_types=1);

namespace Modules\Order\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Modules\Http\Controllers\ApiController;
use Modules\Order\Models\OrderItem;
use Modules\Order\Resources\OrderItemCollection;
use Modules\Order\Resources\OrderItemResource;
use Modules\Order\Services\OrderItemService;
use Modules\Order\Validators\OrderItemStoreRequest;
use Modules\Order\Validators\OrderItemUpdateRequest;

class OrderItemController extends ApiController
{

    private $orderItemService;

    /**
     * Create a new controller instance.
     *
     * @param OrderItemService $orderItemService
     */
    public function __construct(OrderItemService $orderItemService)
    {

        //$this->middleware('api');
        $this->orderItemService = $orderItemService;
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
            $data = $this->orderItemService->paginate($limit);

            return $this->sendPaginate(new OrderItemCollection($data));

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

            $data = $this->orderItemService->all();

            return $this->sendResource(OrderItemResource::collection($data));

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

            $data = $this->orderItemService->listOfChoices();

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

            $storeRequest = new OrderItemStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderItemService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderItem $orderItem
     * @return JsonResponse
     */
    public function update(OrderItem $orderItem)
    {
        try {

            $updateRequest = new OrderItemUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderItemService->update(request()->all(), $orderItem);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderItem $orderItem
     * @return JsonResponse
     */
    public function show(OrderItem $orderItem): JsonResponse
    {

        try {

            return $this->sendResource(new OrderItemResource($orderItem));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderItem $orderItem
     * @return JsonResponse
     */
    public function delete(OrderItem $orderItem): JsonResponse
    {

        try {

            $item = $this->orderItemService->find($orderItem);

            return $this->sendResource(new OrderItemResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
