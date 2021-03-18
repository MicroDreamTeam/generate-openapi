<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Info;

use Itwmw\Generate\OpenApi\Core\Support\Arrayable;

/**
 * A simple object to allow referencing other components in the specification, internally and externally.
 *
 * The Reference Object is defined by [JSON Reference](https://tools.ietf.org/html/draft-pbryan-zyp-json-ref-03) and follows the same structure, behavior and rules.
 *
 * For this specification, reference resolution is accomplished as defined by the JSON Reference specification and not by the JSON Schema specification.
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition\Info
 */
class Reference implements Arrayable
{
    /**
     * REQUIRED. The reference string.
     * @var string
     */
    public string $ref;

    public function __construct(string $ref)
    {
        $this->ref = $ref;
    }

    public function toArray(): array
    {
        return empty($this->ref) ? [] : ['$ref' => $this->ref];
    }
}
