<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Server\Request;

use Itwmw\Generate\OpenApi\Core\Support\Arrayable;

/**
 * Lists the required security schemes to execute this operation.
 * The name used for each property MUST correspond to a security scheme declared in the Security Schemes under the Components Object.
 *
 * Security Requirement Objects that contain multiple schemes require that all schemes MUST be satisfied for a request to be authorized.
 * This enables support for scenarios where multiple query parameters or HTTP headers are required to convey security information.
 *
 * When a list of Security Requirement Objects is defined on the Open API object or Operation Object,
 * only one of Security Requirement Objects in the list needs to be satisfied to authorize the request.
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition\Server\Request
 */
class SecurityRequirement implements Arrayable
{
    /**
     * Each name MUST correspond to a security scheme which is declared in the Security Schemes under the Components Object.
     * @var string
     */
    public string $name;

    /**
     *
     * If the security scheme is of type "oauth2" or "openIdConnect",
     * then the value is a list of scope names required for the execution. For other security scheme types,
     * the array MUST be empty.
     * @var string[]
     */
    public array $value = [];

    public function toArray(): array
    {
        if (empty($this->name)) {
            return [];
        }

        return [$this->name => $this->value];
    }
}
