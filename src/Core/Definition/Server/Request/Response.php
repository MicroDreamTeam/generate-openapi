<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Server\Request;

use Itwmw\Generate\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * Describes a single response from an API Operation, including design-time, static links to operations based on the response.
 * @package Itwmw\Generate\OpenApi\Core\Definition\Server\Request
 */
class Response implements Arrayable
{
    use ToArray;

    /**
     * REQUIRED. A short description of the response. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * Maps a header name to its definition.
     * [\[RFC7230\]](https://httpwg.org/specs/rfc7230.html) states header names are case insensitive.
     * If a response header is defined with the name "Content-Type", it SHALL be ignored.
     *
     * Map[string, {@see Header} ¦ {@see Reference}]
     * @var array
     */
    public array $headers = [];

    /**
     * A map containing descriptions of potential response payloads.
     * The key is a media type or [media type range]appendix-D) and the value describes it.
     * For responses that match multiple keys, only the most specific key is applicable. e.g. text/plain overrides text/*
     *
     * Map[string, {@see MediaTypes}]
     * @var array
     */
    public array $content = [];

    /**
     * A map of operations links that can be followed from the response. T
     * he key of the map is a short name for the link,
     * following the naming constraints of the names for Component Objects.
     *
     * Map[string, {@see Link}¦ {@see Reference}]
     * @var array
     */
    public array $links = [];
}
