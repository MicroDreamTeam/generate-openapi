<?php

namespace Itwmw\OpenApi\Builder\Server\Request;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Info\MediaTypesBuilder;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\OpenApi\Core\Definition\Server\Request\RequestBody;

/**
 * Class RequestBodyBuilder
 * @method $this description(string $description);
 * @method $this content(array $content);
 * @method $this required(bool $required);
 * @method RequestBody getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class RequestBodyBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = RequestBody::class;

    /**
     * @param string $accept
     * @param MediaTypes|MediaTypesBuilder|callable $mediaTypes The closure will pass a MediaTypesBuilder object
     * @return $this
     */
    public function addContent(string $accept, $mediaTypes): RequestBodyBuilder
    {
        $mediaTypes                      = Common::getMediaTypes($mediaTypes);
        $this->subject->content[$accept] = $mediaTypes;
        return $this;
    }
}
