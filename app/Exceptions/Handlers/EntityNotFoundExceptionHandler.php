<?php

namespace App\Exceptions\Handlers;

use App\Enums\HTTPStatusCodeEnum;
use Throwable;

class EntityNotFoundExceptionHandler extends BaseExceptionHandler
{
    /**
     * @inheritDoc
     */
    public static function getResponseStatusCode(Throwable $exception): int
    {
        return HTTPStatusCodeEnum::NOT_FOUND->value;
    }
}
