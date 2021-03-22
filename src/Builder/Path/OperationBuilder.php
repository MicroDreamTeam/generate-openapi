<?php

namespace Itwmw\OpenApi\Builder\Path;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Server\Request\RequestBodyBuilder;
use Itwmw\OpenApi\Builder\Server\Request\ResponsesBuilder;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Interfaces\RequestBodyComponent;
use Itwmw\OpenApi\Builder\Support\Traits\AddParameter;
use Itwmw\OpenApi\Builder\Support\Traits\AddServer;
use Itwmw\OpenApi\Builder\Support\Traits\SetExternalDocumentation;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Path\Operation;
use Itwmw\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\OpenApi\Core\Definition\Server\Server;

/**
 * Class OperationBuilder
 * @method $this tags(string[] $tags);
 * @method $this summary(string $summary);
 * @method $this description(string $description);
 * @method $this operationId(string $operationId);
 * @method $this parameters(Parameter[]|Reference[] $parameters);
 * @method $this callbacks(array $callbacks);
 * @method $this deprecated(bool $deprecated);
 * @method $this security(SecurityRequirement[] $security);
 * @method $this servers(Server[] $servers);
 * @method Operation getSubject();
 * @package Itwmw\OpenApi\Builder\Operation
 */
class OperationBuilder extends BaseBuilder
{
    use Instance;
    use SetExternalDocumentation,AddParameter,AddServer;

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
     */
    public function responses($responses): OperationBuilder
    {
        $this->subject->responses = Common::getResponses($responses);
        return $this;
    }
}
