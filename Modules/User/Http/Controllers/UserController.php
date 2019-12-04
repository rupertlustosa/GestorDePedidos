<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\User\Models\User;
use Modules\User\Resources\UserCollection;
use Modules\User\Resources\UserResource;
use Modules\User\Services\UserService;
use Modules\User\Validators\UserStoreRequest;
use Modules\User\Validators\UserUpdateRequest;
use Rlustosa\LaravelGenerator\BaseModule\BaseModuleController;

class UserController extends BaseModuleController
{
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {

        Auth::loginUsingId(1);
        //dd(Auth::user());
        //$this->middleware('jwt.auth');
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {

        try {

            if (!Auth::user()->can('viewAny', User::class)) {

                return $this->sendUnauthorized();
            }

            $limit = (int)(request('limit') ?? 20);
            $data = $this->userService->paginate($limit);

            return $this->sendPaginate(new UserCollection($data));

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

            if (!Auth::user()->can('viewAny', User::class)) {

                return $this->sendUnauthorized();
            }

            $data = $this->userService->all();

            return $this->sendResource(UserResource::collection($data));

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

            if (!Auth::user()->can('create', User::class)) {

                return $this->sendUnauthorized();
            }

            $storeRequest = new UserStoreRequest();
            $validator = Validator::make(request()->all(), $storeRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->userService->create(request()->all());

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function update(User $user)
    {
        try {

            if (!Auth::user()->can('update', $user)) {

                return $this->sendUnauthorized();
            }

            $updateRequest = new UserUpdateRequest();
            $validator = Validator::make(request()->all(), $updateRequest->rules());

            if ($validator->fails()) {

                return $this->sendBadRequest('Validation Error.', $validator->errors()->toArray());
            }

            $item = $this->userService->update(request()->all(), $user);

            return $this->sendResponse($item->toArray());

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {

        try {

            if (!Auth::user()->can('show', $user)) {

                return $this->sendUnauthorized();
            }

            return $this->sendResource(new UserResource($user));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function delete(User $user): JsonResponse
    {

        try {

            $item = $this->userService->find($id);

            if (!Auth::user()->can('delete', $item)) {

                return $this->sendUnauthorized();
            }

            return $this->sendResource(new UserResource($item));

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
