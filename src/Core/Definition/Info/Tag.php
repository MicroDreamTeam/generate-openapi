<?php

namespace Itwmw\OpenApi\Core\Definition\Info;

use Itwmw\OpenApi\Core\Definition\Path\Operation;
use Itwmw\OpenApi\Core\Support\Arrayable;
use Itwmw\OpenApi\Core\Support\ToArray;

/**
 * Adds metadata to a single tag that is used by the {@see Operation} Object.
 * It is not mandatory to have a Tag Object per tag defined in the Operation Object instances.
 *
 * @package Itwmw\OpenApi\Core\Definition\Info
 */
class Tag implements Arrayable
{
    use ToArray;

    /**
     * REQUIRED. The name of the tag.
     * @var string
     */
    public string $name;

    /**
     * 	A short description for the tag. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * Additional external documentation for this tag.
     * @var ExternalDocumentation
     */
    public ExternalDocumentation $externalDocs;
}
