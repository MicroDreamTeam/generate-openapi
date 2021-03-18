<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Path;

use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Callback;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * Describes a single API operation on a path.
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition\Path
 */
class Operation implements Arrayable
{
    use ToArray;

    /**
     * A list of tags for API documentation control. Tags can be used for logical grouping of operations by resources or any other qualifier.
     * @var string[]
     */
    public array $tags = [];

    /**
     * A short summary of what the operation does.
     * @var string
     */
    public string $summary;

    /**
     * A verbose explanation of the operation behavior. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * Additional external documentation for this operation.
     * @var ExternalDocumentation
     */
    public ExternalDocumentation $externalDocs;

    /**
     * Unique string used to identify the operation. The id MUST be unique among all operations described in the API.
     * The operationId value is case-sensitive.
     * Tools and libraries MAY use the operationId to uniquely identify an operation, therefore,
     * it is RECOMMENDED to follow common programming naming conventions.
     * @var string
     */
    public string $operationId;

    /**
     * A list of parameters that are applicable for this operation. If a parameter is already defined at the Path Item,
     * the new definition will override it but can never remove it.
     * The list MUST NOT include duplicated parameters. A unique parameter is defined by a combination of a name and location.
     * The list can use the Reference Object to link to parameters that are defined at the OpenAPI Object’s components/parameters.
     * @var Parameter[]|Reference[]
     */
    public array $parameters = [];

    /**
     * The request body applicable for this operation.
     * The requestBody is only supported in HTTP methods where the HTTP 1.1 specification
     * [\[RFC7231\]](https://httpwg.org/specs/rfc7231.html)
     * has explicitly defined semantics for request bodies.
     * In other cases where the HTTP spec is vague, requestBody SHALL be ignored by consumers.
     * @var RequestBody|Reference
     */
    public $requestBody;

    /**
     * REQUIRED. The list of possible responses as they are returned from executing this operation.
     * @var Responses
     */
    public Responses $responses;

    /**
     * A map of possible out-of band callbacks related to the parent operation.
     * The key is a unique identifier for the Callback Object. Each value in the map is a {@see Callback} Object that describes a
     * request that may be initiated by the API provider and the expected responses.
     * The key value used to identify the callback object is an expression, evaluated at runtime,
     * that identifies a URL to use for the callback operation.
     *
     * Map[string, {@see Callback} ¦ {@see Reference}]
     * @var array
     */
    public array $callbacks = [];

    /**
     * Declares this operation to be deprecated. Consumers SHOULD refrain from usage of the declared operation.
     * Default value is false.
     * @var bool
     */
    public bool $deprecated;

    /**
     * A declaration of which security mechanisms can be used for this operation.
     * The list of values includes alternative security requirement objects that can be used.
     * Only one of the security requirement objects need to be satisfied to authorize a request.
     * This definition overrides any declared top-level security.
     * To remove a top-level security declaration, an empty array can be used.
     * @var SecurityRequirement[]
     */
    public array $security = [];

    /**
     * An alternative server array to service this operation.
     * If an alternative server object is specified at the Path Item Object or Root level,
     * it will be overridden by this value.
     * @var Server[]
     */
    public array $servers = [];
}
