<?php

namespace App\Exceptions\Factories;

use App\Exceptions\Handlers\BadRequestExceptionHandler;
use App\Exceptions\Handlers\EntityNotFoundExceptionHandler;
use App\Exceptions\Handlers\NotFoundExceptionHandler;
use App\Exceptions\Handlers\ValidationExceptionHandler;
use BadMethodCallException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionHandlerFactory
{
    private const EXCEPTION_HANDLERS = [
        ModelNotFoundException::class => EntityNotFoundExceptionHandler::class,
        ValidationException::class => ValidationExceptionHandler::class,
        NotFoundHttpException::class => NotFoundExceptionHandler::class,
        MethodNotAllowedHttpException::class => NotFoundExceptionHandler::class,
        BadMethodCallException::class => BadRequestExceptionHandler::class,
    ];

    /**
     * @param $exception
     * @return string|null
     */
    public static function getExceptionHandler($exception): ?string
    {
        foreach (self::EXCEPTION_HANDLERS as $exceptionClass => $handler) {
            if ($exception instanceof $exceptionClass) {
                return $handler;
            }
        }
        return null;
    }
}
