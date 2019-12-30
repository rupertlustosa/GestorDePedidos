<?php

declare(strict_types=1);

namespace Modules\Order\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Modules\Http\Controllers\ApiController;
use Modules\Order\Models\OrderStatus;
use Modules\Order\Resources\OrderStatusCollection;
use Modules\Order\Resources\OrderStatusResource;
use Modules\Order\Services\OrderStatusService;
use Modules\Order\Validators\OrderStatusStoreRequest;
use Modules\Order\Validators\OrderStatusUpdateRequest;

class OrderStatusController extends ApiController
{

    private $orderStatusService;

    /**
     * Create a new controller instance.
     *
     * @param OrderStatusService $orderStatusService
     */
    public function __construct(OrderStatusService $orderStatusService)
    {

        //$this->middleware('api');
        $this->orderStatusService = $orderStatusService;
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
            $data = $this->orderStatusService->paginate($limit);

            return $this->sendPaginate(new OrderStatusCollection($data));

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

            $data = $this->orderStatusService->all();

            return $this->sendResource(OrderStatusResource::collection($data));

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

            $data = $this->orderStatusService->listOfChoices();

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

            $storeRequest = new OrderStatusStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderStatusService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderStatus $orderStatus
     * @return JsonResponse
     */
    public function update(OrderStatus $orderStatus)
    {
        try {

            $updateRequest = new OrderStatusUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderStatusService->update(request()->all(), $orderStatus);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderStatus $orderStatus
     * @return JsonResponse
     */
    public function show(OrderStatus $orderStatus): JsonResponse
    {

        try {

            return $this->sendResource(new OrderStatusResource($orderStatus));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderStatus $orderStatus
     * @return JsonResponse
     */
    public function delete(OrderStatus $orderStatus): JsonResponse
    {

        try {

            $item = $this->orderStatusService->find($orderStatus);

            return $this->sendResource(new OrderStatusResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
