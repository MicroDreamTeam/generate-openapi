<?php

namespace Itwmw\Generate\OpenApi\Core\Definition;

use Itwmw\Generate\OpenApi\Core\Definition\Info\Components;
use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Info;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Path;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Support\Arrayable;
use Itwmw\Generate\OpenApi\Core\Support\ToArray;
use Spyc;

/**
 * This is the root document object
 *
 * @package Itwmw\Generate\OpenApi\Core\Definition
 */
class Root implements Arrayable
{
    use ToArray {
        toArray as _toArray;
    }

    /**
     * REQUIRED.
     * This string MUST be the version number of the OpenAPI Specification that the OpenAPI document uses.
     * The openapi field SHOULD be used by tooling to interpret the OpenAPI document.
     * This is not related to the API info.version string.
     * @var string
     */
    public string $openapi = '3.0.0';

    /**
     * REQUIRED.
     * Provides metadata about the API. The metadata MAY be used by tooling as required.
     * @see http://spec.openapis.org/oas/v3.1.0#infoObject
     * @var Info
     */
    public Info $info;

    /**
     * The default value for the $schema keyword within Schema Objects contained within this OAS document. This MUST be in the form of a URI.
     * @var string
     */
    public string $jsonSchemaDialect;

    /**
     * An array of Server Objects, which provide connectivity information to a target server.
     * If the servers property is not provided,
     * or is an empty array, the default value would be a Server Object with a url value of /.
     * @var Server[]
     */
    public array $servers = [];

    /**
     * An element to hold various schemas for the specification.
     * @var Components
     */
    public Components $components;

    /**
     * REQUIRED. The available paths and operations for the API.
     * @var Path[]
     */
    public array $paths = [];

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
     * A list of tags used by the specification with additional metadata.
     * The order of the tags can be used to reflect on their order by the parsing tools.
     * Not all tags that are used by the Operation Object must be declared.
     * The tags that are not declared MAY be organized randomly or based on the tools’ logic.
     * Each tag name in the list MUST be unique.
     * @var array
     */
    public array $tags = [];

    /**
     * Additional external documentation.
     * @var ExternalDocumentation
     */
    public ExternalDocumentation $externalDocs;

    public function toArray(): array
    {
        $data = $this->_toArray();
        if (!empty($data['paths'])) {
            $data['paths'] = $this->mergeArraysToObjects($data['paths']);
        }
        return $data;
    }

    public function dumpYamlToFile(string $path): bool
    {
        if (file_put_contents($path, $this->toYaml())) {
            return true;
        }
        return false;
    }

    public function toYaml(): string
    {
        return Spyc::YAMLDump($this->toArray());
    }
}
