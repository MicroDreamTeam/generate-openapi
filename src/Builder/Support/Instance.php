<?php

namespace Itwmw\Generate\OpenApi\Builder\Support;

trait Instance
{
    protected static object $instance;

    public static function instance(...$params)
    {
        if (self::$instance) {
            self::$instance = new static(...$params);
        }

        /** @var static */
        return self::$instance;
    }

    public static function make(...$params)
    {
        return new static(...$params);
    }
}
