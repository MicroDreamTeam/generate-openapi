<?php

namespace Itwmw\OpenApi\Core\Definition\Info;

use Itwmw\OpenApi\Core\Support\Arrayable;
use Itwmw\OpenApi\Core\Support\ToArray;

/**
 * Allows referencing an external resource for extended documentation.
 * @package Itwmw\OpenApi\Core\Definition\Info
 */
class ExternalDocumentation implements Arrayable
{
    use ToArray;

    /**
     * A description of the target documentation. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * REQUIRED. The URL for the target documentation. This MUST be in the form of a URL.
     * @var string
     */
    public string $url;
}
