<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Paths;

/**
 * Class PathsBuilder
 * @method $this paths(array $paths);
 * @method Paths getSubject();
 * @package Itwmw\Generate\OpenApi\Builder
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
