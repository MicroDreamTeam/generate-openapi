<?php

namespace Itwmw\OpenApi\Builder\Path\Params;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Path\Params\Xml;

/**
 * Class XmlBuilder
 * @method $this name(string $name);
 * @method $this namespace(string $namespace);
 * @method $this prefix(string $prefix);
 * @method $this attribute(bool $attribute);
 * @method $this wrapped(bool $wrapped);
 * @method Xml getSubject();
 * @package Itwmw\OpenApi\Builder\Path\Params
 */
class XmlBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Xml::class;
}
