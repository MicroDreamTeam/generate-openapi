<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Info;

use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

class Example implements Arrayable
{
    use ToArray;

    /**
     * Short description for the example.
     * @var string
     */
    public string $summary;

    /**
     * Long description for the example. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * Embedded literal example. The value field and externalValue field are mutually exclusive.
     * To represent examples of media types that cannot naturally represented in JSON or YAML,
     * use a string value to contain the example, escaping where necessary.
     *
     * If the type is an array, make sure that only scalars exist in the array.
     * @var scalar|array
     */
    public $value;

    /**
     * A URL that points to the literal example.
     * This provides the capability to reference examples that cannot easily be included in JSON or YAML documents.
     * The value field and externalValue field are mutually exclusive.
     * @var string
     */
    public string $externalValue;
}
