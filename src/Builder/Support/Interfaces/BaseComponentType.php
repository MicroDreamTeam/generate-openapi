<?php

namespace Itwmw\Generate\OpenApi\Builder\Support\Interfaces;

use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;

interface BaseComponentType
{
    public static function getRef(): Reference;
    public static function getRefString(): string;
}
