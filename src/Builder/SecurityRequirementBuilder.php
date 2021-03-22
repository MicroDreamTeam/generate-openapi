<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\SecurityRequirement;

/**
 * Class SecurityRequirementBuilder
 * @method $this name(string $name);
 * @method $this value(string[] $value);
 * @method SecurityRequirement getSubject();
 * @package Itwmw\Generate\OpenApi\Builder
 */
class SecurityRequirementBuilder extends BaseBuilder
{
    protected string $subjectClass = SecurityRequirement::class;
}
