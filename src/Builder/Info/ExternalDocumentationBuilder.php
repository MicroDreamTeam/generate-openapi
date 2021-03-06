<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Info\ExternalDocumentation;

/**
 * Class ExternalDocumentationBuilder
 * @method $this description(string $description);
 * @method $this url(string $url);
 * @method ExternalDocumentation getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class ExternalDocumentationBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = ExternalDocumentation::class;
}
