<?php

namespace Itwmw\OpenApi\Builder\Server\Request;

use Itwmw\OpenApi\Builder\Path\Params\ParameterBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Server\Request\Header;

/**
 * Class HeaderBuilder
 * @method HeaderBuilder getSubject();
 * @package Itwmw\OpenApi\Builder\Server\Request
 */
class HeaderBuilder extends ParameterBuilder
{
    use Instance;

    protected string $subjectClass = Header::class;
}
