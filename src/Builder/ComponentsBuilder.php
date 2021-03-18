<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Schema\SchemaBuilder;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Components;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

class ComponentsBuilder
{
    use Instance;

    protected Components $components;

    public function __construct()
    {
        $this->components = new Components();
    }

    /**
     * @param string $name
     * @param callable|SchemaBuilder|Schema $schema The closure will pass a SchemaBuilder object
     * @return $this
     * @throws GenerateBuilderException
     */
    public function addSchemas(string $name, $schema): ComponentsBuilder
    {
        $this->components->schemas[$name] = Common::getSchema($schema);
        return $this;
    }

    public function getComponents(): Components
    {
        return $this->components;
    }
}
