<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Server\Request;

use Itwmw\Generate\OpenApi\Core\Definition\Path\Operation;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * The Link object represents a possible design-time link for a response.
 * The presence of a link does not guarantee the caller’s ability to successfully invoke it,
 * rather it provides a known relationship and traversal mechanism between responses and other operations.
 *
 * Unlike dynamic links (i.e. links provided in the response payload),
 * the OAS linking mechanism does not require link information in the runtime response.
 *
 * For computing links, and providing instructions to execute them,
 * a runtime expression is used for accessing values in an operation and using them as parameters while invoking the linked operation.
 *
 * A linked operation MUST be identified using either an `operationRef` or `operationId`.
 * In the case of an `operationId`, it MUST be unique and resolved in the scope of the OAS document.
 * Because of the potential for name clashes, the `operationRef` syntax is preferred for specifications with external references.
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition\Server\Request
 */
class Link implements Arrayable
{
    use ToArray;

    /**
     * A relative or absolute reference to an OAS operation.
     * This field is mutually exclusive of the operationId field, and MUST point to an {@see Operation} Object.
     * Relative operationRef values MAY be used to locate an existing {@see Operation} Object in the OpenAPI definition.
     * @var string
     */
    public string $operationRef;

    /**
     * The name of an existing, resolvable OAS operation, as defined with a unique operationId.
     * This field is mutually exclusive of the operationRef field.
     * @var string
     */
    public string $operationId;

    /**
     * A map representing parameters to pass to an operation as specified with operationId or identified via operationRef.
     * The key is the parameter name to be used,
     * whereas the value can be a constant or an expression to be evaluated and passed to the linked operation.
     * The parameter name can be qualified using the parameter location [{in}.]{name} for operations that use the
     * same parameter name in different locations (e.g. path.id).
     *
     * Map[string, Any ¦ {expression}]
     * @var array
     */
    public array $parameters = [];

    /**
     * A literal value or {expression} to use as a request body when calling the target operation.
     * @var string Any|{expression}
     */
    public string $requestBody;

    /**
     * 	A description of the link. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * A server object to be used by the target operation.
     * @var Server
     */
    public Server $server;
}
