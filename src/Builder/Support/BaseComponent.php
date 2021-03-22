<?php

namespace Itwmw\OpenApi\Builder\Support;

use Itwmw\OpenApi\Builder\Support\Interfaces\CallbackComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\ExampleComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\HeaderComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\LinkComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\ParameterComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\RequestBodyComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\ResponseComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\SchemaComponent;
use Itwmw\OpenApi\Builder\Support\Interfaces\SecuritySchemeComponent;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Exception\GenerateBuilderException;

abstract class BaseComponent implements Interfaces\BaseComponent
{
    final public static function getRef(): Reference
    {
        return new Reference(static::getRefString());
    }

    final public static function getRefString(): string
    {
        if (is_subclass_of(static::class, CallbackComponent::class)) {
            return '#/components/callbacks/' . self::getName();
        } elseif (is_subclass_of(static::class, ExampleComponent::class)) {
            return '#/components/examples/' . self::getName();
        } elseif (is_subclass_of(static::class, HeaderComponent::class)) {
            return '#/components/headers/' . self::getName();
        } elseif (is_subclass_of(static::class, LinkComponent::class)) {
            return '#/components/links/' . self::getName();
        } elseif (is_subclass_of(static::class, ParameterComponent::class)) {
            return '#/components/parameters/' . self::getName();
        } elseif (is_subclass_of(static::class, RequestBodyComponent::class)) {
            return '#/components/requestBodies/' . self::getName();
        } elseif (is_subclass_of(static::class, ResponseComponent::class)) {
            return '#/components/responses/' . self::getName();
        } elseif (is_subclass_of(static::class, SchemaComponent::class)) {
            return '#/components/schemas/' . self::getName();
        } elseif (is_subclass_of(static::class, SecuritySchemeComponent::class)) {
            return '#/components/securitySchemes/' . self::getName();
        } else {
            throw new GenerateBuilderException('Not a valid Component');
        }
    }

    final public static function getName(): string
    {
        return lcfirst(basename(static::class));
    }
}
