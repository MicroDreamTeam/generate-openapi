<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Core\Definition\Info\License;

/**
 * Class LicenseBuilder
 * @method $this name(string $name);
 * @method $this url(string $url);
 * @method License getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class LicenseBuilder extends BaseBuilder
{
    protected string $subjectClass = License::class;
}
