<?php

namespace App\enums;

enum AppEnvironmentEnum: string
{
    case LOCAL = 'local';
    case PRODUCTION = 'production';
}
