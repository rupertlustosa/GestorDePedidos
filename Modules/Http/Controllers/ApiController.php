<?php

declare(strict_types=1);

namespace Modules\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * success response method.
     *
     * @param array $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendSimpleJson(array $result = []): JsonResponse
    {

        return response()->json($result, Response::HTTP_OK);
    }

    /**
     * success response method.
     *
     * @param array $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendResponse(array $result = [], string $message = ''): JsonResponse
    {

        $response = [
            'data' => $result,
            'message' => $message,
        ];

        if (!empty($result) || !empty($message)) {

            if (!empty($result)) {
                $response['data'] = $result;
            }

            if (!empty($message)) {
                $response['message'] = $message;
            }

        } /*else {

            $responseCode = Response::HTTP_NO_CONTENT;
        }*/

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * success response method.
     *
     * @param JsonResource $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendResource(JsonResource $result, string $message = ''): JsonResponse
    {

        $response = [];

        if (!empty($result) || !empty($message)) {

            if (!empty($result)) {
                $response['data'] = $result;
            }

            if (!empty($message)) {
                $response['message'] = $message;
            }

        }

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * success response method.
     *
     * @param JsonResource $result
     * @return JsonResponse
     */
    public function sendPaginate(JsonResource $result): JsonResponse
    {

        return response()->json($result->additional([])->resource, Response::HTTP_OK);
    }

    /**
     * return error response.
     *
     * @param string $error
     * @param Exception $exception
     * @param int $code
     * @return JsonResponse
     */
    public function sendError(string $error, Exception $exception, int $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {

        $response = [
            'message' => $error,
        ];

        $response['server_error'] = $exception->getMessage();
        //$response['server_trace'] = $exception->getTraceAsString();
        $response['server_file'] = $exception->getFile();
        $response['server_line'] = $exception->getLine();

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return JsonResponse
     */
    public function sendUnauthorized(): JsonResponse
    {

        $response = [
            'message' => 'Acesso não autorizado',
        ];

        return response()->json($response, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * return error response.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendBadRequest(string $error, array $errorMessages = [], int $code = Response::HTTP_UNPROCESSABLE_ENTITY): JsonResponse
    {

        $response = [
            'message' => $error,
        ];

        if (!empty($errorMessages)) {

            //$response['data'] = $errorMessages;
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return JsonResponse
     */
    public function sendNotFound(): JsonResponse
    {

        $response = [
            'message' => 'Não encontrado',
        ];

        return response()->json($response, Response::HTTP_NOT_FOUND);
    }
}

