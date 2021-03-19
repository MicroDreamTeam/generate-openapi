<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class ResponseBuilder
 * @method $this description(string $description);
 * @method $this headers(array $headers);
 * @method $this content(array $content);
 * @method $this links(array $links);
 * @package Itwmw\Generate\OpenApi\Builder\Server\Request
 */
class ResponseBuilder
{
    use Instance;

    protected Response $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    /**
     * @param string $accept
     * @param MediaTypes|MediaTypesBuilder|callable $mediaTypes The closure will pass a MediaTypesBuilder object
     * @return $this
     * @throws GenerateBuilderException
     */
    public function addContent(string $accept, $mediaTypes): ResponseBuilder
    {
        $mediaTypes                       = Common::getMediaTypes($mediaTypes);
        $this->response->content[$accept] = $mediaTypes;
        return $this;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function __call($name, $arguments)
    {
        if (property_exists(Response::class, $name) && !empty($arguments)) {
            $this->response->$name = $arguments[0];
            return $this;
        }
        throw new GenerateBuilderException('Method does not exist or parameter is empty');
    }
}
