<?php

namespace Itwmw\OpenApi\Core\Definition\Server\Request;

use Itwmw\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\OpenApi\Core\Support\Arrayable;

/**
 * A map of possible out-of band callbacks related to the parent operation.
 * Each value in the map is a Path Item Object that describes a set of requests that may be
 * initiated by the API provider and the expected responses.
 * The key value used to identify the callback object is an expression,
 * evaluated at runtime, that identifies a URL to use for the callback operation.
 * @package Itwmw\OpenApi\Core\Definition\Server\Request
 */
class Callback implements Arrayable
{
    /**
     * Runtime expressions allow defining values based on information that will only be available within the HTTP message in an actual API call.
     * @var string
     */
    public string $expression;

    /**
     * A Path Item Object used to define a callback request and expected responses.
     * @var PathItem
     */
    public PathItem $pathItem;

    public function toArray(): array
    {
        if (empty($this->expression) || empty($this->pathItem)) {
            return [];
        }
        
        return [$this->expression => $this->pathItem->toArray()];
    }
}
