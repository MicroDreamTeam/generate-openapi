<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Path;

use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;

/**
 * Holds the relative paths to the individual endpoints and their operations.
 * The path is appended to the URL from the {@see Server} Object in order to construct the full URL.
 * The Paths MAY be empty, due to Access Control List (ACL) constraints.
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition\Path
 */
class Path implements Arrayable
{
    /**
     * A relative path to an individual endpoint. The field name MUST begin with a forward slash (/).
     * The path is appended (no relative URL resolution) to the expanded URL from the Server Object’s url field in
     * order to construct the full URL. Path templating is allowed. When matching URLs,
     * concrete (non-templated) paths would be matched before their templated counterparts.
     * Templated paths with the same hierarchy but different templated names MUST NOT exist as they are identical.
     * In case of ambiguous matching, it’s up to the tooling to decide which one to use.
     * @var string
     */
    public string $path;

    /**
     * Describes the operations available on a single path.
     * A Path Item MAY be empty, due to ACL constraints.
     * The path itself is still exposed to the documentation viewer but they will not know which operations and parameters are available.
     * @var PathItem
     */
    public PathItem $item;

    public function toArray(): array
    {
        if (empty($this->path) || empty($this->item)) {
            return [];
        }

        return [$this->path => $this->item->toArray()];
    }
}
