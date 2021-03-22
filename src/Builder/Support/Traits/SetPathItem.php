<?php

namespace Itwmw\OpenApi\Builder\Support\Traits;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Path\PathItemBuilder;
use Itwmw\OpenApi\Core\Definition\Path\PathItem;

trait SetPathItem
{
    /**
     * @param PathItem|PathItemBuilder|callable $pathItem
     * @return $this
     */
    public function pathItem($pathItem)
    {
        $this->subject->pathItem = Common::getPathItem($pathItem);
        return $this;
    }
}
