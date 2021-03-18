<?php

namespace Itwmw\Generate\OpenApi\Core\Definition\Info;

use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Callback;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Link;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;

/**
 * Holds a set of reusable objects for different aspects of the OAS.
 * All objects defined within the components object will have no effect on the API unless they are explicitly referenced
 * from properties outside the components object.
 * This object MAY be extended with Specification Extensions.
 *
 * All the fixed fields declared above are objects that MUST use keys that match the regular expression: ^[a-zA-Z0-9\.\-_]+$.
 * @package Itwmw\Generate\OpenApi\Core\Definition\Info
 */
class Components implements Arrayable
{
    use ToArray;

    /**
     * An object to hold reusable {@see Schema} Objects.
     *
     * Map[string, {@see Schema} ¦ {@see Reference}]
     * @var array
     */
    public array $schemas = [];

    /**
     * An object to hold reusable {@see Response} Objects.
     *
     * Map[string, {@see Response} ¦ {@see Reference}]
     * @var array
     */
    public array $responses = [];

    /**
     * An object to hold reusable {@see Parameter} Objects.
     *
     * Map[string, {@see Parameter} ¦ {@see Reference}]
     * @var array
     */
    public array $parameters = [];

    /**
     * An object to hold reusable {@see Example} Objects.
     *
     * Map[string, {@see Example} ¦ {@see Reference}]
     * @var array
     */
    public array $examples = [];

    /**
     * An object to hold reusable {@see RequestBody} Objects.
     *
     * Map[string, {@see RequestBody} ¦ {@see Reference}]
     * @var array
     */
    public array $requestBodies = [];

    /**
     * An object to hold reusable {@see Header} Objects.
     *
     * Map[string, {@see Header} ¦ {@see Reference}]
     * @var array
     */
    public array $headers = [];

    /**
     * An object to hold reusable {@see SecurityRequirement} Objects.
     *
     * Map[string, {@see SecurityRequirement} ¦ {@see Reference}]
     * @var array
     */
    public array $securitySchemes = [];

    /**
     * An object to hold reusable {@see Link} Objects.
     *
     * Map[string, {@see Link} ¦ {@see Reference}]
     * @var array
     */
    public array $links = [];

    /**
     * An object to hold reusable {@see Callback} Objects.
     *
     * Map[string, {@see Callback} ¦ {@see Reference}]
     * @var array
     */
    public array $callbacks = [];
}
