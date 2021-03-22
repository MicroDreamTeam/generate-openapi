<?php

namespace Itwmw\OpenApi\Core\Definition\Path;

use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\OpenApi\Core\Definition\Server\Server;
use Itwmw\OpenApi\Core\Support\Arrayable;
use Itwmw\OpenApi\Core\Support\ToArray;

/**
 * Describes the operations available on a single path.
 * A Path Item MAY be empty, due to ACL constraints.
 * The path itself is still exposed to the documentation viewer but they will not know which operations and parameters are available.
 *
 * @package Itwmw\OpenApi\Core\Definition\Path
 */
class PathItem implements Arrayable
{
    use ToArray{
        toArray as _toArray;
    }

    /**
     * Allows for a referenced definition of this path item. The referenced structure MUST be in the form of a Path Item Object.
     * In case a Path Item Object field appears both in the defined object and the referenced object,
     * the behavior is undefined. See the rules for resolving Relative References.
     * @var string
     */
    public string $ref;

    /**
     * An optional, string summary, intended to apply to all operations in this path.
     * @var string
     */
    public string $summary;

    /**
     * An optional, string description, intended to apply to all operations in this path. CommonMark syntax MAY be used for rich text representation.
     * @var string
     */
    public string $description;

    /**
     * A definition of a GET operation on this path.
     * @var Operation
     */
    public Operation $get;

    /**
     * A definition of a PUT operation on this path.
     * @var Operation
     */
    public Operation $put;

    /**
     * A definition of a POST operation on this path.
     * @var Operation
     */
    public Operation $post;

    /**
     * A definition of a DELETE operation on this path.
     * @var Operation
     */
    public Operation $delete;

    /**
     * A definition of a OPTIONS operation on this path.
     * @var Operation
     */
    public Operation $options;

    /**
     * A definition of a HEAD operation on this path.
     * @var Operation
     */
    public Operation $head;

    /**
     * A definition of a PATCH operation on this path.
     * @var Operation
     */
    public Operation $patch;

    /**
     * A definition of a TRACE operation on this path.
     * @var Operation
     */
    public Operation $trace;

    /**
     * An alternative server array to service all operations in this path.
     * @var Server[]
     */
    public array $servers = [];

    /**
     * A list of parameters that are applicable for all the operations described under this path.
     * These parameters can be overridden at the operation level, but cannot be removed there.
     * The list MUST NOT include duplicated parameters.
     * A unique parameter is defined by a combination of a name and location.
     * The list can use the Reference Object to link to parameters that are defined at the OpenAPI Object’s components/parameters.
     * @var Parameter[]|Reference[]
     */
    public array $parameters = [];

    public function toArray(): array
    {
        $data = $this->_toArray();

        if (isset($data['ref'])) {
            $data['$ref'] = $data['ref'];
            unset($data['ref']);
        }

        return $data;
    }
}
