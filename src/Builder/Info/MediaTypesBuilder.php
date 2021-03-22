<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Traits\SetSchema;
use Itwmw\OpenApi\Core\Definition\Info\MediaTypes;

/**
 * Class MediaTypesBuilder
 * @method $this example(scalar|array $example);
 * @method $this examples(array $examples);
 * @method $this encoding(array $encoding);

 * @method MediaTypes getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class MediaTypesBuilder extends BaseBuilder
{
    use Instance,SetSchema;

    protected string $subjectClass = MediaTypes::class;
}
