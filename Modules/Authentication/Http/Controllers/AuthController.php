<?php

declare(strict_types=1);

namespace Modules\Authentication\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Rlustosa\LaravelGenerator\BaseModule\BaseModuleController;

class AuthController extends BaseModuleController
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {

        //$this->middleware('jwt.auth');
    }

    /**
     * Paginate.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {

        try {

            return $this->sendResponse([]);

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * return all.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {

        try {

            return $this->sendResponse([]);

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Find detail using id.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {

        try {

            return $this->sendResponse([]);

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Store.
     *
     * @return JsonResponse
     */
    public function store()
    {

        try {

            return $this->sendResponse([]);

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }

    /**
     * Update.
     *
     * @return JsonResponse
     */
    public function update(int $id)
    {

        try {

            return $this->sendResponse([]);

        } catch (Exception $exception) {

            return $this->sendError('Server Error.', $exception);

        }
    }
}
