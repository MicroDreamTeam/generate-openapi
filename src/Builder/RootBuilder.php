<?php

namespace Itwmw\OpenApi\Builder;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Info\ComponentsBuilder;
use Itwmw\OpenApi\Builder\Info\InfoBuilder;
use Itwmw\OpenApi\Builder\Path\PathsBuilder;
use Itwmw\OpenApi\Builder\Server\Request\SecurityRequirementBuilder;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Traits\AddServer;
use Itwmw\OpenApi\Builder\Support\Traits\SetExternalDocumentation;
use Itwmw\OpenApi\Core\Definition\Info\Components;
use Itwmw\OpenApi\Core\Definition\Info\Info;
use Itwmw\OpenApi\Core\Definition\Path\Paths;
use Itwmw\OpenApi\Core\Definition\Root;
use Itwmw\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\OpenApi\Core\Definition\Server\Server;

/**
 * Class RootBuilder
 * @method $this openapi(string $openapi);
 * @method $this jsonSchemaDialect(string $jsonSchemaDialect);
 * @method $this servers(Server[] $servers);
 * @method $this security(SecurityRequirement[] $security);
 * @method $this tags(array $tags);
 * @method Root getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class RootBuilder extends BaseBuilder
{
    use Instance;
    use SetExternalDocumentation,AddServer;

    protected string $subjectClass = Root::class;

    /**
     * @param SecurityRequirement|SecurityRequirementBuilder|callable $security The closure will pass a SecurityRequirementBuilder object
     * @return $this
     */
    public function addSecurity($security): RootBuilder
    {
        $this->subject->security[] = Common::getSecurityRequirement($security);
        return $this;
    }

    public function addTag(string $tag): RootBuilder
    {
        $this->subject->tags[] = $tag;
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
