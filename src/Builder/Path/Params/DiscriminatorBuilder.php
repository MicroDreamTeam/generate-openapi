<?php

namespace Itwmw\OpenApi\Builder\Path\Params;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Path\Params\Discriminator;

/**
 * Class DiscriminatorBuilder
 * @method $this propertyName(string $propertyName);
 * @method $this mapping(array $mapping);
 * @method Discriminator getSubject();
 * @package Itwmw\OpenApi\Builder\Path\Params
 */
class DiscriminatorBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Discriminator::class;
}
