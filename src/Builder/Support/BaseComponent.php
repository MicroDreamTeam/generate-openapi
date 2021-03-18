<?php

namespace Itwmw\Generate\OpenApi\Builder\Support;

use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\CallbackComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ExampleComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\HeaderComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\LinkComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ParameterComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\RequestBodyComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ResponseComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\SchemaComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\SecuritySchemeComponent;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

abstract class BaseComponent implements Interfaces\BaseComponent
{
    public static function getRef(): Reference
    {
        return new Reference(static::getRefString());
    }

    public static function getRefString(): string
    {
        if (static::class instanceof CallbackComponent) {
            return '#/components/callbacks/' . basename(static::class);
        } elseif (static::class instanceof ExampleComponent) {
            return '#/components/examples/' . basename(static::class);
        } elseif (static::class instanceof HeaderComponent) {
            return '#/components/headers/' . basename(static::class);
        } elseif (static::class instanceof LinkComponent) {
            return '#/components/links/' . basename(static::class);
        } elseif (static::class instanceof ParameterComponent) {
            return '#/components/parameters/' . basename(static::class);
        } elseif (static::class instanceof RequestBodyComponent) {
            return '#/components/requestBodies/' . basename(static::class);
        } elseif (static::class instanceof ResponseComponent) {
            return '#/components/responses/' . basename(static::class);
        } elseif (static::class instanceof SchemaComponent) {
            return '#/components/schemas/' . basename(static::class);
        } elseif (static::class instanceof SecuritySchemeComponent) {
            return '#/components/securitySchemes/' . basename(static::class);
        } else {
            throw new GenerateBuilderException('Not a valid Component');
        }
    }
}
