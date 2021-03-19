<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Components;
use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Info;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Paths;
use Itwmw\Generate\OpenApi\Core\Definition\Root;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;

/**
 * Class RootBuilder
 * @method $this openapi(string $openapi);
 * @method $this jsonSchemaDialect(string $jsonSchemaDialect);
 * @method $this servers(Server[] $servers);
 * @method $this security(SecurityRequirement[] $security);
 * @method $this tags(array $tags);
 * @method $this externalDocs(ExternalDocumentation $externalDocs);
 * @method Root getSubject();
 * @package Itwmw\Generate\OpenApi\Builder
 */
class RootBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Root::class;

    /**
     * @param Server|ServerBuilder|callable $server The closure will pass a ServerBuilder object
     * @return $this
     */
    public function addServer($server): RootBuilder
    {
        $this->subject->servers[] = Common::getServer($server);
        return $this;
    }
    /**
     * @param Info|InfoBuilder|callable $info The closure will pass a InfoBuilder object
     * @return $this
     */
    public function info($info): RootBuilder
    {
        $this->subject->info = Common::getInfo($info);
        return $this;
    }

    /**
     * @param Paths|PathsBuilder|callable $paths The closure will pass a PathsBuilder object
     * @return $this
     */
    public function paths($paths): RootBuilder
    {
        $this->subject->paths = Common::getPaths($paths);
        return $this;
    }

    /**
     * @param Components|ComponentsBuilder|callable $components The closure will pass a ComponentsBuilder object
     * @return $this
     */
    public function components($components): RootBuilder
    {
        $this->subject->components = Common::getComponents($components);
        return $this;
    }
}
