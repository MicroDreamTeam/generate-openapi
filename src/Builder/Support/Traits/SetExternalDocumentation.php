<?php

namespace Itwmw\OpenApi\Builder\Support\Traits;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Info\ExternalDocumentationBuilder;
use Itwmw\OpenApi\Core\Definition\Info\ExternalDocumentation;

trait SetExternalDocumentation
{
    /**
     * @param ExternalDocumentation|ExternalDocumentationBuilder|callable $externalDocs
     * The closure will pass a ExternalDocumentationBuilder object
     * @return $this
     */
    public function externalDocs($externalDocs)
    {
        $this->subject->externalDocs = Common::getExternalDocumentation($externalDocs);
        return $this;
    }
}
