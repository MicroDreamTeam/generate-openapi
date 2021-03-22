<?php

namespace Itwmw\OpenApi\Core\Definition\Server\Request;

use Itwmw\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\OpenApi\Core\Support\Arrayable;
use Itwmw\OpenApi\Core\Support\ToArray;

/**
 * Describes a single request body.
 *
 * This object MAY be extended with Specification Extensions.
 *
 * @package Itwmw\OpenApi\Core\Definition\Server\Request
 */
class RequestBody implements Arrayable
{
    use ToArray;

    /**
     * A brief description of the request body. This could contain examples of use. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * REQUIRED. The content of the request body. The key is a media type or [media type range]appendix-D) and the value describes it.
     * For requests that match multiple keys, only the most specific key is applicable. e.g. text/plain overrides text/*
     *
     * Map[string, {@see MediaTypes}]
     * @var array
     */
    public array $content = [];

    /**
     * Determines if the request body is required in the request. Defaults to false.
     * @var bool
     */
    public bool $required;
}
