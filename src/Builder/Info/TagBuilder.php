<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Traits\SetExternalDocumentation;
use Itwmw\OpenApi\Core\Definition\Info\Tag;

/**
 * Class TagBuilder
 * @method $this name(string $name);
 * @method $this description(string $description);
 * @method Tag getSubject();
 * @package Itwmw\OpenApi\Builder\Info
 */
class TagBuilder extends BaseBuilder
{
    use Instance,SetExternalDocumentation;

    protected string $subjectClass = Tag::class;
}
