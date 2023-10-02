<?php

namespace App\SystemServices;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonologFactory
{
    private static $log;
    public static function getInstance()
    {
        if (self::$log == null) {
            $log = new Logger('MEUAPP');
            $log->pushHandler(new StreamHandler('meuslogs.log', Logger::DEBUG));
        } else {
            return self::$log;
        }
    }
};
