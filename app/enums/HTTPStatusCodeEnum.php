<?php

namespace App\enums;

enum HTTPStatusCodeEnum: int
{
    case OK = 200;
    case BAD_REQUEST = 400;
    case FORBIDDEN = 403;
    case NOT_FOUND = 404;
    case UNPROCESSABLE_ENTITY = 422;
    case INTERNAL_SERVER_ERROR = 500;
}
