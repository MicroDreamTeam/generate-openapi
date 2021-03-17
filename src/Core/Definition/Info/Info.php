<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Info;

use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * The object provides metadata about the API.
 * The metadata MAY be used by the clients if needed,
 * and MAY be presented in editing or documentation generation tools for convenience.
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition
 */
class Info implements Arrayable
{
    use ToArray;
    /**
     * REQUIRED. The title of the API.
     * @var string
     */
    public string $title;

    /**
     * A description of the API. [CommonMark syntax](https://spec.commonmark.org/) MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * A URL to the Terms of Service for the API. MUST be in the format of a URL.
     * @var string
     */
    public string $termsOfService;

    /**
     * The contact information for the exposed API.
     * @var Contact
     */
    public Contact $contact;

    /**
     * The license information for the exposed API.
     * @var License
     */
    public License $license;

    /**
     * REQUIRED. The version of the OpenAPI document
     *
     * (which is distinct from the OpenAPI Specification version or the API implementation version).
     * @var string
     */
    public string $version;
}
