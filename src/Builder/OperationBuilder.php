<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
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
class OperationBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Operation::class;
    
    public function addTag(string $tag): OperationBuilder
    {
        $this->subject->tags[] = $tag;
        return $this;
    }

    /**
     * @param RequestBody|callable|Reference|RequestBodyBuilder|RequestBodyComponent $requestBody
     * The closure will pass a RequestBodyBuilder object
     * @return OperationBuilder
     */
    public function requestBody($requestBody): OperationBuilder
    {
        if (is_subclass_of($requestBody, RequestBodyComponent::class)) {
            $this->subject->requestBody = $requestBody::getRef();
            return $this;
        }

        if ($requestBody instanceof Reference) {
            $this->subject->requestBody = $requestBody;
            return $this;
        }

        $this->subject->requestBody = Common::getRequestBody($requestBody);
        return $this;
    }

    /**
     * @param Responses|ResponsesBuilder|callable $responses The closure will pass a ResponsesBuilder object
     * @return OperationBuilder
     * @throws GenerateBuilderException
     */
    public function responses($responses): OperationBuilder
    {
        $this->subject->responses = Common::getResponses($responses);
        return $this;
    }
}
