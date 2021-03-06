<?php

namespace Itwmw\OpenApi\Core\Definition\Server;

use Itwmw\OpenApi\Core\Support\Arrayable;
use Itwmw\OpenApi\Core\Support\ToArray;

/**
 * An object representing a Server Variable for server URL template substitution.
 * This object MAY be extended with Specification Extensions.
 * @package Itwmw\OpenApi\Core\Definition\Server
 */
class ServerVariable implements Arrayable
{
    use ToArray;
    /**
     * An enumeration of string values to be used if the substitution options are from a limited set. The array MUST NOT be empty.
     * @var array
     */
    public array $enum = [];

    /**
     * REQUIRED. The default value to use for substitution, which SHALL be sent if an alternate value is not supplied.
     * Note this behavior is different than the Schema Object’s treatment of default values,
     * because in those cases parameter values are optional.
     * If the enum is defined, the value MUST exist in the enum’s values.
     * @var string
     */
    public string $default;

    /**
     * An optional description for the server variable. [CommonMark syntax](https://spec.commonmark.org/) MAY be used for rich text representation.
     * @var string
     */
    public string $description;
}
