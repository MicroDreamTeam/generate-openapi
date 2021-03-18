<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Path\Params;

use Itwmw\Generate\OpenApi\Core\Definition\Info\DataTypeContainers;
use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * The Schema Object allows the definition of input and output data types.
 * These types can be objects, but also primitives and arrays.
 * This object is a superset of the [JSON Schema Specification Draft 2020-12](https://tools.ietf.org/html/draft-bhutton-json-schema-00).
 *
 * For more information about the properties, see
 * [JSON Schema Core](https://tools.ietf.org/html/draft-bhutton-json-schema-00)
 * and
 * [JSON Schema Validation](https://tools.ietf.org/html/draft-bhutton-json-schema-validation-00).
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition\Server\Request
 */
class Schema implements Arrayable
{
    use ToArray{
        ToArray::toArray as _toArray;
    }

    /**
     * Allows sending a null value for the defined schema. Default value is false.
     * @var bool
     */
    public bool $nullable;

    /**
     * Adds support for polymorphism.
     * The discriminator is an object name that is used to differentiate between other schemas which may satisfy the payload description.
     * @var Discriminator
     */
    public Discriminator $discriminator;

    /**
     * Relevant only for Schema "properties" definitions. Declares the property as "read only".
     * This means that it MAY be sent as part of a response but SHOULD NOT be sent as part of the request.
     * If the property is marked as readOnly being true and is in the required list, the required will take effect on the response only.
     * A property MUST NOT be marked as both readOnly and writeOnly being true. Default value is false.
     * @var bool
     */
    public bool $readOnly;

    /**
     * Relevant only for Schema "properties" definitions. Declares the property as “write only”. Therefore,
     * it MAY be sent as part of a request but SHOULD NOT be sent as part of the response.
     * If the property is marked as writeOnly being true and is in the required list,
     * the required will take effect on the request only.
     * A property MUST NOT be marked as both readOnly and writeOnly being true. Default value is false.
     * @var bool
     */
    public bool $writeOnly;

    /**
     * This MAY be used only on properties schemas. It has no effect on root schemas.
     * Adds additional metadata to describe the XML representation of this property.
     * @var Xml
     */
    public Xml $xml;

    /**
     * Additional external documentation for this schema.
     * @var ExternalDocumentation
     */
    public ExternalDocumentation $externalDocs;

    /**
     * A free-form property to include an example of an instance for this schema.
     * To represent examples that cannot be naturally represented in JSON or YAML,
     * a string value can be used to contain the example with escaping where necessary.
     *
     * To better allow the program to process it, it is fixed here in array format.
     * Please do not place objects inside arrays
     * @var array
     */
    public array $example = [];

    /**
     * Specifies that a schema is deprecated and SHOULD be transitioned out of usage. Default value is false.
     * @var bool
     */
    public bool $deprecated;

    const _ARRAY = 'array';

    const BOOLEAN = 'boolean';

    const INTEGER = 'integer';

    const NUMBER = 'number';

    const OBJECT = 'object';

    const STRING = 'string';

    /** @var string */
    public string $title;

    /** @var string */
    public string $description;

    /** @var float|null */
    public ?float $multipleOf;

    /** @var float|null */
    public ?float $maximum;

    /** @var bool|float|null */
    public $exclusiveMaximum;

    /** @var float|null */
    public ?float $minimum;

    /** @var bool|float */
    public $exclusiveMinimum;

    /** @var int|null */
    public ?int $maxLength;

    /** @var int|null */
    public ?int $minLength;

    /** @var string|null */
    public ?string $pattern;

    /** @var bool|Schema */
    public $additionalItems;

    /** @var Schema|Reference */
    public $items;

    /** @var int|null */
    public ?int $maxItems;

    /** @var int|null */
    public ?int $minItems;

    /** @var bool|null */
    public ?bool $uniqueItems;

    /** @var int */
    public int $maxProperties;

    /** @var int */
    public int $minProperties;

    /**
     * When used for `parameters`, a boolean value is available, when used for `properties`, this parameter should not be used.
     * string[]|bool
     * @var string[]|bool
     */
    public $required;

    /**
     * Value can be boolean or object. Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     * @var bool|Schema|Reference
     */
    public $additionalProperties;

    /** @var Schema[] */
    public array $definitions = [];

    /**
     * MAP[field,{@see Schema}]
     * @var array
     */
    public array $properties = [];

    /** @var Schema[] */
    public array $patternProperties = [];

    /** @var Schema[]|string[][]|array[] */
    public array $dependencies = [];

    /** @var array */
    public array $enum = [];

    /**
     * Value MUST be a string. Multiple types via an array are not supported.
     * @var string|DataTypeContainers
     */
    public $type;

    /** @var string|null */
    public ?string $format;

    /**
     *  Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     * @var Schema[]|array|Reference[]
     */
    public array $allOf = [];

    /**
     *  Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     * @var Schema[]|array|Reference[]
     */
    public array $anyOf = [];

    /**
     * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     * @var Schema[]|array|Reference[]
     */
    public array $oneOf = [];

    /**
     * Inline or referenced schema MUST be of a Schema Object and not a standard JSON Schema.
     * @var Schema[]|array|Reference[]
     */
    public array $not = [];

    // draft6
    /** @var Schema */
    public Schema $contains;

    /** @var Schema */
    public Schema $propertyNames;

    // draft7
    /** @var Schema */
    public Schema $if;

    /** @var Schema */
    public Schema $then;

    /** @var Schema */
    public Schema $else;

    /** @var string */
    public string $contentMediaType;

    /** @var string */
    public string $contentEncoding;

    public function toArray(): array
    {
        $data = $this->_toArray();
        
        if (isset($data['type']) && !empty($data['type']) && $data['type'] instanceof DataTypeContainers) {
            $type = $data['type'];
            if (!empty($type->type)) {
                $data['type'] = $type->type;
            }

            if (!empty($type->format)) {
                $data['format'] = $type->format;
            }
        }

        return $data;
    }
}
