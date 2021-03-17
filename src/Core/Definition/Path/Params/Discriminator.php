<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Path\Params;

use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * When request bodies or response payloads may be one of a number of different schemas,
 * a discriminator object can be used to aid in serialization, deserialization, and validation.
 * The discriminator is a specific object in a schema which is used to inform the consumer of the document of an
 * alternative schema based on the value associated with it.
 *
 * When using the discriminator, inline schemas will not be considered.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * The discriminator object is legal only when using one of the composite keywords oneOf, anyOf, allOf.
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition\Path\Params
 */
class Discriminator implements Arrayable
{
    use ToArray;

    /**
     * REQUIRED. The name of the property in the payload that will hold the discriminator value.
     * @var string
     */
    public string $propertyName;

    /**
     * An object to hold mappings between payload values and schema names or references.
     * Map[string, string]
     * @var array
     */
    public array $mapping;
}
