<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;

/**
 * Class ExternalDocumentationBuilder
 * @method $this description(string $description);
 * @method $this url(string $url);
 * @method ExternalDocumentation getSubject();
 * @package Itwmw\Generate\OpenApi\Builder
 */
class ExternalDocumentationBuilder extends BaseBuilder
{
    protected string $subjectClass = ExternalDocumentation::class;
}
