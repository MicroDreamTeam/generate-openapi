<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\RequestBodyComponent;
use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Operation;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class OperationBuilder
 * @method $this tags(string[] $tags);
 * @method $this summary(string $summary);
 * @method $this description(string $description);
 * @method $this externalDocs(ExternalDocumentation $externalDocs);
 * @method $this operationId(string $operationId);
 * @method $this parameters(Parameter[]|Reference[] $parameters);
 * @method $this callbacks(array $callbacks);
 * @method $this deprecated(bool $deprecated);
 * @method $this security(SecurityRequirement[] $security);
 * @method $this servers(Server[] $servers);
 * @package Itwmw\Generate\OpenApi\Builder\Operation
 */
class OperationBuilder
{
    use Instance;

    protected Operation $operation;

    public function __construct()
    {
        $this->operation = new Operation();
    }

    public function addTag(string $tag): OperationBuilder
    {
        $this->operation->tags[] = $tag;
        return $this;
    }

    /**
     * @param RequestBody|callable|Reference|RequestBodyBuilder|RequestBodyComponent $requestBody
     * The closure will pass a RequestBodyBuilder object
     * @return OperationBuilder
     * @throws GenerateBuilderException
     */
    public function requestBody($requestBody): OperationBuilder
    {
        if (is_subclass_of($requestBody, RequestBodyComponent::class)) {
            $this->operation->requestBody = $requestBody::getRef();
            return $this;
        }

        if ($requestBody instanceof Reference) {
            $this->operation->requestBody = $requestBody;
            return $this;
        }

        $this->operation->requestBody = Common::getRequestBody($requestBody);
        return $this;
    }

    /**
     * @param Responses|ResponsesBuilder|callable $responses The closure will pass a ResponsesBuilder object
     * @return OperationBuilder
     * @throws GenerateBuilderException
     */
    public function responses($responses): OperationBuilder
    {
        $this->operation->responses = Common::getResponses($responses);
        return $this;
    }

    public function getOperation(): Operation
    {
        return $this->operation;
    }

    public function __call($name, $arguments)
    {
        if (property_exists(Operation::class, $name) && !empty($arguments)) {
            $this->operation->$name = $arguments[0];
            return $this;
        }
        throw new GenerateBuilderException('Method does not exist or parameter is empty');
    }
}
