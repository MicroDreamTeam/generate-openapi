<?php

namespace Itwmw\Generate\OpenApi\Builder\Common;

use Itwmw\Generate\OpenApi\Builder\Operation\MediaTypesBuilder;
use Itwmw\Generate\OpenApi\Builder\Operation\OperationBuilder;
use Itwmw\Generate\OpenApi\Builder\Schema\SchemaBuilder;
use Itwmw\Generate\OpenApi\Builder\Server\Request\RequestBodyBuilder;
use Itwmw\Generate\OpenApi\Builder\Server\Request\ResponseBuilder;
use Itwmw\Generate\OpenApi\Builder\Server\Request\ResponsesBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Operation;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class Common
 * @package Itwmw\Generate\OpenApi\Builder\Common
 */
class Common
{
    /**
     * Get the Schema Object
     * @param SchemaBuilder|Schema|callable $schema The closure will pass a SchemaBuilder object
     * @return Schema
     * @throws GenerateBuilderException
     */
    public static function getSchema($schema): Schema
    {
        if ($schema instanceof SchemaBuilder) {
            $_schema = $schema->getSchema();
        } elseif (is_callable($schema)) {
            $_schema = new SchemaBuilder();
            call_user_func($schema, $_schema);
            $_schema = $_schema->getSchema();
        } elseif ($schema instanceof Schema) {
            $_schema = $schema;
        } else {
            throw new GenerateBuilderException('Not valid schema');
        }
        return $_schema;
    }

    /**
     * Get the Media Types Object
     * @param  MediaTypes|MediaTypesBuilder|callable $mediaTypes The closure will pass a MediaTypesBuilder object
     * @return MediaTypes
     * @throws GenerateBuilderException
     */
    public static function getMediaTypes($mediaTypes): MediaTypes
    {
        if ($mediaTypes instanceof MediaTypes) {
            return $mediaTypes;
        }

        if (is_callable($mediaTypes)) {
            $mediaTypesBuilder = new MediaTypesBuilder();
            call_user_func($mediaTypes, $mediaTypesBuilder);
            return $mediaTypesBuilder->getMediaTypes();
        }

        if ($mediaTypes instanceof MediaTypesBuilder) {
            return $mediaTypes->getMediaTypes();
        }

        throw new GenerateBuilderException('Not valid MediaTypes');
    }

    /**
     * Get the Request Body Object
     * @param RequestBody|RequestBodyBuilder|callable $requestBody  The closure will pass a RequestBodyBuilder object
     * @return RequestBody
     * @throws GenerateBuilderException
     */
    public static function getRequestBody($requestBody): RequestBody
    {
        if ($requestBody instanceof RequestBody) {
            return $requestBody;
        }

        if ($requestBody instanceof RequestBodyBuilder) {
            return $requestBody->getRequestBody();
        }

        if (is_callable($requestBody)) {
            $requestBodyBuilder = new RequestBodyBuilder();
            call_user_func($requestBody, $requestBodyBuilder);
            return $requestBodyBuilder->getRequestBody();
        }

        throw new GenerateBuilderException('Not valid RequestBody');
    }

    /**
     * Get the Response Body Object
     * @param Response|ResponseBuilder|callable $response The closure will pass a ResponseBuilder object
     * @return Response
     * @throws GenerateBuilderException
     */
    public static function getResponse($response): Response
    {
        if ($response instanceof Response) {
            return $response;
        }

        if ($response instanceof ResponseBuilder) {
            return $response->getResponse();
        }

        if (is_callable($response)) {
            $responseBuilder = new ResponseBuilder();
            call_user_func($response, $responseBuilder);
            return $responseBuilder->getResponse();
        }

        throw new GenerateBuilderException('Not valid Response');
    }

    /**
     * Get the Responses Body Object
     * @param Responses|ResponsesBuilder|callable $responses The closure will pass a ResponsesBuilder object
     * @return Responses
     * @throws GenerateBuilderException
     */
    public static function getResponses($responses): Responses
    {
        if ($responses instanceof Responses) {
            return $responses;
        }

        if ($responses instanceof ResponsesBuilder) {
            return $responses->getResponses();
        }

        if (is_callable($responses)) {
            $responsesBuilder = new ResponsesBuilder();
            call_user_func($responses, $responsesBuilder);
            return $responsesBuilder->getResponses();
        }

        throw new GenerateBuilderException('Not valid Responses');
    }

    /**
     * Get the Operation Body Object
     * @param Operation|OperationBuilder|callable $operation The closure will pass a OperationBuilder object
     * @return Operation
     * @throws GenerateBuilderException
     */
    public static function getOperation($operation): Operation
    {
        if ($operation instanceof Operation) {
            return $operation;
        }

        if ($operation instanceof OperationBuilder) {
            return $operation->getOperation();
        }

        if (is_callable($operation)) {
            $operationBuilder = new OperationBuilder();
            call_user_func($operation, $operationBuilder);
            return $operationBuilder->getOperation();
        }

        throw new GenerateBuilderException('Not valid Operation');
    }
}
