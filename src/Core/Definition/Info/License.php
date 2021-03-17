<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Info;

use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * License information for the exposed API.
 * @package Itwmw\Generate\OpenApi\Core\Definition\Info
 */
class License implements Arrayable
{
    use ToArray;
    
    /**
     * REQUIRED. The license name used for the API.
     * @var string
     */
    public string $name;

    /**
     * A URL to the license used for the API. This MUST be in the form of a URL.
     * The `url` field is mutually exclusive of the `identifier` field.
     * @var string
     */
    public string $url;
}
