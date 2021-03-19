<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

class RequestBodyBuilder
{
    use Instance;

    protected RequestBody $requestBody;

    public function __construct()
    {
        $this->requestBody = new RequestBody();
    }

    public function content(array $content): RequestBodyBuilder
    {
        $this->requestBody->content = $content;
        return $this;
    }

    /**
     * @param string $accept
     * @param MediaTypes|MediaTypesBuilder|callable $mediaTypes The closure will pass a MediaTypesBuilder object
     * @return $this
     * @throws GenerateBuilderException
     */
    public function addContent(string $accept, $mediaTypes): RequestBodyBuilder
    {
        $mediaTypes                          = Common::getMediaTypes($mediaTypes);
        $this->requestBody->content[$accept] = $mediaTypes;
        return $this;
    }

    public function description(string $description): RequestBodyBuilder
    {
        $this->requestBody->description = $description;
        return $this;
    }

    public function required(bool $required): RequestBodyBuilder
    {
        $this->requestBody->required = $required;
        return $this;
    }
    
    public function getRequestBody(): RequestBody
    {
        return $this->requestBody;
    }
}
