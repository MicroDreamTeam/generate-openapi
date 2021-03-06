<?php

namespace Itwmw\OpenApi\Core\Definition\Path\Params;

use Itwmw\OpenApi\Core\Support\Arrayable;
use Itwmw\OpenApi\Core\Support\ToArray;

/**
 * A metadata object that allows for more fine-tuned XML model definitions.
 *
 * When using arrays, XML element names are not inferred (for singular/plural forms) and the name property SHOULD be used to add that information.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @package Itwmw\OpenApi\Core\Definition\Path\Params
 */
class Xml implements Arrayable
{
    use ToArray;

    /**
     * Replaces the name of the element/attribute used for the described schema property.
     * When defined within items, it will affect the name of the individual XML elements within the list.
     * When defined alongside type being array (outside the items),
     * it will affect the wrapping element and only if wrapped is true. If wrapped is false, it will be ignored.
     * @var string
     */
    public string $name;

    /**
     * The URI of the namespace definition. Value MUST be in the form of an absolute URI.
     * @var string
     */
    public string $namespace;

    /**
     * The prefix to be used for the name.
     * @var string
     */
    public string $prefix;

    /**
     * Declares whether the property definition translates to an attribute instead of an element. Default value is false.
     * @var bool
     */
    public bool $attribute;

    /**
     * MAY be used only for an array definition. Signifies whether the array is wrapped
     * (for example, `<books><book/><book/></books>`) or unwrapped (`<book/><book/>`).
     * Default value is false. The definition takes effect only when defined alongside type being array (outside the items).
     * @var bool
     */
    public bool $wrapped;
}
