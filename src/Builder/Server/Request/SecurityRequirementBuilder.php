<?php

namespace Itwmw\OpenApi\Builder\Server\Request;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Server\Request\SecurityRequirement;

/**
 * Class SecurityRequirementBuilder
 * @method $this name(string $name);
 * @method $this value(string[] $value);
 * @method SecurityRequirement getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class SecurityRequirementBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = SecurityRequirement::class;
}
