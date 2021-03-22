<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Info\Reference;

/**
 * Class ReferenceBuilder
 * @method $this ref(string $ref);
 * @method Reference getSubject();
 * @package Itwmw\OpenApi\Builder\Info
 */
class ReferenceBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Reference::class;
}
