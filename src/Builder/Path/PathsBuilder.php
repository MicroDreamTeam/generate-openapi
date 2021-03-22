<?php

namespace Itwmw\OpenApi\Builder\Path;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\OpenApi\Core\Definition\Path\Paths;

/**
 * Class PathsBuilder
 * @method $this paths(array $paths);
 * @method Paths getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class PathsBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Paths::class;

    /**
     * @param string $uri
     * @param PathItem|PathItemBuilder|callable $pathItem
     * @return $this
     */
    public function addPaths(string $uri, $pathItem): PathsBuilder
    {
        $this->subject->paths[$uri] = Common::getPathItem($pathItem);
        return $this;
    }
}
