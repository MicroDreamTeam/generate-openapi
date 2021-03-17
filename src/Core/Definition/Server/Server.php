<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Server;

use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * An object representing a Server.
 * @package Itwmw\Generate\OpenApi\Core\Definition\Server
 */
class Server implements Arrayable
{
    use ToArray;

    /**
     * REQUIRED. A URL to the target host. This URL supports Server Variables and MAY be relative,
     * to indicate that the host location is relative to the location where the OpenAPI document is being served.
     * Variable substitutions will be made when a variable is named in {brackets}.
     * @var string
     */
    public string $url;

    /**
     * An optional string describing the host designated by the URL. [CommonMark syntax MAY](https://spec.commonmark.org/) be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * A map between a variable name and its value. The value is used for substitution in the server’s URL template.
     * Map[string, {@see ServerVariable}]
     * @var array
     */
    public array $variables = [];
}
