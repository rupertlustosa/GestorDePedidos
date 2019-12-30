<?php

declare(strict_types=1);

namespace Modules\Authentication\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Authentication\Models\Role;
use Modules\Authentication\Resources\RoleCollection;
use Modules\Authentication\Resources\RoleResource;
use Modules\Authentication\Services\RoleService;
use Modules\Authentication\Validators\RoleStoreRequest;
use Modules\Authentication\Validators\RoleUpdateRequest;
use Modules\Http\Controllers\ApiController;

class RoleController extends ApiController
{

    private $roleService;

    /**
     * Create a new controller instance.
     *
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {

        //$this->middleware('api');
        $this->roleService = $roleService;
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
            $data = $this->roleService->paginate($limit);

            return $this->sendPaginate(new RoleCollection($data));

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

            $data = $this->roleService->all();

            return $this->sendResource(RoleResource::collection($data));

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

            $data = $this->roleService->listOfChoices();

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

            $storeRequest = new RoleStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->roleService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Role $role
     * @return JsonResponse
     */
    public function update(Role $role)
    {
        try {

            $updateRequest = new RoleUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->roleService->update(request()->all(), $role);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return JsonResponse
     */
    public function show(Role $role): JsonResponse
    {

        try {

            return $this->sendResource(new RoleResource($role));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return JsonResponse
     */
    public function delete(Role $role): JsonResponse
    {

        try {

            $item = $this->roleService->find($role);

            return $this->sendResource(new RoleResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
