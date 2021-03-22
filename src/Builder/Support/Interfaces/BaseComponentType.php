<?php

namespace Itwmw\OpenApi\Builder\Support\Interfaces;

use Itwmw\OpenApi\Core\Definition\Info\Reference;

interface BaseComponentType
{
    public static function getRef(): Reference;
    public static function getRefString(): string;
}
