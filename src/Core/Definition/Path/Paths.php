<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Path;

use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * Holds the relative paths to the individual endpoints and their operations.
 * The path is appended to the URL from the {@see Server} Object in order to construct the full URL.
 * The Paths MAY be empty, due to ACL constraints.
 * @package Itwmw\Generate\OpenApi\Core\Definition\Path
 */
class Paths implements Arrayable
{
    use ToArray;
    /**
     * A relative path to an individual endpoint.
     * The field name MUST begin with a slash.
     * The path is appended (no relative URL resolution) to the expanded URL from the Server Object's url field in order to construct the full URL.
     * Path templating is allowed. When matching URLs, concrete (non-templated) paths would be matched before their templated counterparts.
     * Templated paths with the same hierarchy but different templated names MUST NOT exist as they are identical.
     * In case of ambiguous matching, it’s up to the tooling to decide which one to use.
     *
     * Map[string,{@see PathItem}]
     * @var array
     */
    public array $paths = [];

    public function toArray(): array
    {
        $data = array_map([$this, 'processData'], $this->paths);
        return array_filter($data);
    }
}
