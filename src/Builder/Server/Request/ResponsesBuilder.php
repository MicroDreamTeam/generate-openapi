<?php

namespace Itwmw\OpenApi\Builder\Server\Request;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Interfaces\ResponseComponent;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\OpenApi\Core\Definition\Server\Request\Responses;

/**
 * Class ResponsesBuilder
 * @method $this default(Response|Reference $default);
 * @method $this httpStatusCode(array $httpStatusCode);
 * @method Responses getSubject();
 * @package Itwmw\OpenApi\Builder
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
