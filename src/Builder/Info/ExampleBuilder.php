<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Info\Example;

/**
 * Class ExampleBuilder
 * @method $this summary(string $summary);
 * @method $this description(string $description);
 * @method $this value(scalar|array $value);
 * @method $this externalValue(string $externalValue);
 * @method Example getSubject();
 * @package Itwmw\OpenApi\Builder\Info
 */
class ExampleBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Example::class;
}
