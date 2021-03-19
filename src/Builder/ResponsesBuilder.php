<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ResponseComponent;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Responses;

/**
 * Class ResponsesBuilder
 * @method $this default(Response|Reference $default);
 * @method $this httpStatusCode(array $httpStatusCode);
 * @method Responses getSubject();
 * @package Itwmw\Generate\OpenApi\Builder
 */
class ResponsesBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Responses::class;

    /**
     * @param int $httpStatusCode
     * @param Response|ResponseBuilder|callable|ResponseComponent|Reference $response The closure will pass a ResponseBuilder object
     * @return $this
     */
    public function addResponse(int $httpStatusCode, $response): ResponsesBuilder
    {
        if (is_subclass_of($response, ResponseComponent::class)) {
            $this->subject->httpStatusCode[$httpStatusCode] = $response::getRef();
            return $this;
        }

        if ($response instanceof Reference) {
            $this->subject->httpStatusCode[$httpStatusCode] = $response;
            return $this;
        }

        $this->subject->httpStatusCode[$httpStatusCode] = Common::getResponse($response);
        return $this;
    }
}
