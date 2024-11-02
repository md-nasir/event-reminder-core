<?php

namespace App\Traits;

use App\Http\Response\AppResponse;

/**
 * Trait ApiResponser
 * @package App\Traits
 */
trait ApiResponser
{
    /**
     * @param $data
     * @param null $message
     * @param int $statusCode
     * @return mixed
     */
    public function successResponse($data, $message = null, $statusCode = AppResponse::HTTP_OK)
    {
        return response()->json([
            "success" => true,
            'message' => $message,
            "status_code" => $statusCode,
            "data" => $data,
        ], APPResponse::HTTP_OK);
    }

    /**
     * @param array $errors
     * @param string $message
     * @param int $statusCode
     * @return mixed
     */
    public function errorResponse(
        array $errors = [],
        $message = 'Something went wrong! Please try again later.',
        $statusCode = AppResponse::HTTP_NOT_FOUND
    )
    {
        return response()->json([
            "success" => false,
            'message' => $message,
            "status_code" => $statusCode,
            "errors" => $errors,
        ], AppResponse::HTTP_OK);
    }

}
