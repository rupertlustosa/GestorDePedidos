<?php

declare(strict_types=1);

namespace Modules\Order\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Modules\Http\Controllers\ApiController;
use Modules\Order\Models\OrderPoint;
use Modules\Order\Resources\OrderPointCollection;
use Modules\Order\Resources\OrderPointResource;
use Modules\Order\Services\OrderPointService;
use Modules\Order\Validators\OrderPointStoreRequest;
use Modules\Order\Validators\OrderPointUpdateRequest;

class OrderPointController extends ApiController
{

    private $orderPointService;

    /**
     * Create a new controller instance.
     *
     * @param OrderPointService $orderPointService
     */
    public function __construct(OrderPointService $orderPointService)
    {

        //$this->middleware('api');
        $this->orderPointService = $orderPointService;
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
            $data = $this->orderPointService->paginate($limit);

            return $this->sendPaginate(new OrderPointCollection($data));

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

            $data = $this->orderPointService->all();

            return $this->sendResource(OrderPointResource::collection($data));

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

            $storeRequest = new OrderPointStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderPointService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderPoint $orderPoint
     * @return JsonResponse
     */
    public function update(OrderPoint $orderPoint)
    {
        try {

            $updateRequest = new OrderPointUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->orderPointService->update(request()->all(), $orderPoint);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderPoint $orderPoint
     * @return JsonResponse
     */
    public function show(OrderPoint $orderPoint): JsonResponse
    {

        try {

            return $this->sendResource(new OrderPointResource($orderPoint));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param OrderPoint $orderPoint
     * @return JsonResponse
     */
    public function delete(OrderPoint $orderPoint): JsonResponse
    {

        try {

            $item = $this->orderPointService->find($orderPoint);

            return $this->sendResource(new OrderPointResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
