<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ResponseComponent;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

class ResponsesBuilder
{
    use Instance;

    protected Responses $responses;

    public function __construct()
    {
        $this->responses = new Responses();
    }

    /**
     * @param Response|Reference $default
     * @return $this
     */
    public function default($default): ResponsesBuilder
    {
        $this->responses->default = $default;
        return $this;
    }

    /**
     * @param int $httpStatusCode
     * @param Response|ResponseBuilder|callable|ResponseComponent|Reference $response The closure will pass a ResponseBuilder object
     * @return $this
     * @throws GenerateBuilderException
     */
    public function addResponse(int $httpStatusCode, $response): ResponsesBuilder
    {
        if (is_subclass_of($response, ResponseComponent::class)) {
            $this->responses->httpStatusCode[$httpStatusCode] = $response::getRef();
            return $this;
        }

        if ($response instanceof Reference) {
            $this->responses->httpStatusCode[$httpStatusCode] = $response;
        }

        $this->responses->httpStatusCode[$httpStatusCode] = Common::getResponse($response);
        return $this;
    }

    public function getResponses(): Responses
    {
        return $this->responses;
    }
}
