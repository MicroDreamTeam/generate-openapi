<?php

namespace Itwmw\OpenApi\Builder\Path\Params;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Traits\SetSchema;
use Itwmw\OpenApi\Core\Definition\Path\Params\Parameter;

/**
 * Class ParameterBuilder
 * @method $this name(string $name);
 * @method $this in(string $in);
 * @method $this description(string $description);
 * @method $this required(bool $required);
 * @method $this deprecated(bool $deprecated);
 * @method $this allowEmptyValue(bool $allowEmptyValue);
 * @method $this style(string $style);
 * @method $this explode(bool $explode);
 * @method $this allowReserved(bool $allowReserved);
 * @method $this example(scalar|array $example);
 * @method $this examples(array $examples);
 * @method Parameter getSubject();
 * @package Itwmw\OpenApi\Builder\Path\Params
 */
class ParameterBuilder extends BaseBuilder
{
    use Instance,SetSchema;

    protected string $subjectClass = Parameter::class;
}
