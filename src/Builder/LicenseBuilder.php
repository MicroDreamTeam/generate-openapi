<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\License;

/**
 * Class LicenseBuilder
 * @method $this name(string $name);
 * @method $this url(string $url);
 * @method License getSubject();
 * @package Itwmw\Generate\OpenApi\Builder
 */
class LicenseBuilder extends BaseBuilder
{
    protected string $subjectClass = License::class;
}
