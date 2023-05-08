<?php

namespace App\Exceptions;

use App\enums\AppEnvironmentEnum;
use App\Exceptions\Factories\ExceptionHandlerFactory;
use App\Exceptions\Handlers\UnhandledExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($handler = ExceptionHandlerFactory::getExceptionHandler($e)) {
            return call_user_func($handler . '::handle', $request, $e);
        }

        //Display Laravel error page in local
        if (App::environment(AppEnvironmentEnum::LOCAL->value)) {
            return parent::render($request, $e);
        }

        return UnhandledExceptionHandler::handle($request, $e);
    }
}
