<?php

namespace App\Exceptions\Handlers;

use App\Enums\HTTPStatusCodeEnum;
use Throwable;

class BadRequestExceptionHandler extends BaseExceptionHandler
{
    /**
     * @inheritDoc
     */
    public static function getResponseStatusCode(Throwable $exception): int
    {
        return HTTPStatusCodeEnum::BAD_REQUEST->value;
    }
}
