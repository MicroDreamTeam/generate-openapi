<?php

namespace Itwmw\Generate\OpenApi\Builder\Support\Traits;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\ExternalDocumentationBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;

trait SetExternalDocumentation
{
    /**
     * @param ExternalDocumentation|ExternalDocumentationBuilder|callable $externalDocs The closure will pass a ExternalDocumentationBuilder object
     * @return $this
     */
    public function externalDocs($externalDocs)
    {
        $this->subject->externalDocs = Common::getExternalDocumentation($externalDocs);
        return $this;
    }
}
