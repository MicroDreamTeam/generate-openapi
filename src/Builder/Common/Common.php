<?php

namespace Itwmw\Generate\OpenApi\Builder\Common;

use Itwmw\Generate\OpenApi\Builder\MediaTypesBuilder;
use Itwmw\Generate\OpenApi\Builder\OperationBuilder;
use Itwmw\Generate\OpenApi\Builder\PathItemBuilder;
use Itwmw\Generate\OpenApi\Builder\RequestBodyBuilder;
use Itwmw\Generate\OpenApi\Builder\ResponseBuilder;
use Itwmw\Generate\OpenApi\Builder\ResponsesBuilder;
use Itwmw\Generate\OpenApi\Builder\SchemaBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Operation;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\Generate\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class Common
 * @method static PathItem getPathItem(PathItem|PathItemBuilder|callable $pathItem)
 * @method static PathItem getSchema(Schema|SchemaBuilder|callable $schema)
 * @method static PathItem getMediaTypes(MediaTypes|MediaTypesBuilder|callable $mediaTypes)
 * @method static PathItem getRequestBody(RequestBody|RequestBodyBuilder|callable $requestBody)
 * @method static PathItem getResponse(Response|ResponseBuilder|callable $response)
 * @method static PathItem getResponses(Responses|ResponsesBuilder|callable $responses)
 * @method static PathItem getOperation(Operation|OperationBuilder|callable $operation)
 * @package Itwmw\Generate\OpenApi\Builder\Common
 */
class Common
{
    protected static array $subjectClassMap = [
        'PathItem'    => PathItem::class,
        'Schema'      => Schema::class,
        'MediaTypes'  => MediaTypes::class,
        'RequestBody' => RequestBody::class,
        'Response'    => Response::class,
        'Responses'   => Responses::class,
        'Operation'   => Operation::class,
    ];
    
    public static function __callStatic($name, $arguments)
    {
        $subject = str_replace('get', '', $name);
        $subject = ucfirst($subject);
        if (empty($arguments)) {
            throw new GenerateBuilderException('Not valid ' . $subject);
        }
        $subjectObject = $arguments[0];

        $subjectBuilderClass = 'Itwmw\Generate\OpenApi\Builder\\' . $subject . 'Builder';

        if ($subjectObject instanceof self::$subjectClassMap[$subject]) {
            return $subjectObject;
        }

        if ($subjectObject instanceof $subjectBuilderClass) {
            return $subjectObject->$name();
        }

        if (is_callable($subjectObject)) {
            $builder = new $subjectBuilderClass();
            call_user_func($subjectObject, $builder);
            return $builder->$name();
        }

        throw new GenerateBuilderException('Not valid ' . $subject);
    }
}
