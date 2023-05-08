<?php

namespace App\Exceptions\Handlers;

use App\Enums\HTTPStatusCodeEnum;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class ValidationExceptionHandler extends BaseExceptionHandler
{
    /**
     * @inheritDoc
     */
    public static function getResponseStatusCode(Throwable $exception): int
    {
        return HTTPStatusCodeEnum::UNPROCESSABLE_ENTITY->value;
    }

    /**
     * @param Request $request
     * @param ValidationException $exception
     * @return array
     */
    public static function getPayload(Request $request, Throwable $exception): array
    {
        $payload = parent::getPayload($request, $exception);
        $payload['errors']['validations'] = $exception->errors();
        return $payload;
    }
}
