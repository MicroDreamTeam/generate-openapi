<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Schema\SchemaBuilder;
use Itwmw\Generate\OpenApi\Builder\Support\BaseComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\CallbackComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ExampleComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\HeaderComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\LinkComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ParameterComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\RequestBodyComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\ResponseComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\SchemaComponent;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\SecuritySchemeComponent;
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
     * @param BaseComponent|string $component BaseComponent Object or Class Name
     * @return $this
     * @throws GenerateBuilderException
     */
    public function addComponent($component): ComponentsBuilder
    {
        if (is_string($component) && class_exists($component)) {
            $component = new $component();
        }
        if (is_subclass_of($component, CallbackComponent::class)) {
            $this->components->callbacks[$component::getName()] = $component();
        } elseif (is_subclass_of($component, ExampleComponent::class)) {
            $this->components->examples[$component::getName()] = $component();
        } elseif (is_subclass_of($component, HeaderComponent::class)) {
            $this->components->headers[$component::getName()] = $component();
        } elseif (is_subclass_of($component, LinkComponent::class)) {
            $this->components->links[$component::getName()] = $component();
        } elseif (is_subclass_of($component, ParameterComponent::class)) {
            $this->components->parameters[$component::getName()] = $component();
        } elseif (is_subclass_of($component, RequestBodyComponent::class)) {
            $this->components->requestBodies[$component::getName()] = $component();
        } elseif (is_subclass_of($component, ResponseComponent::class)) {
            $this->components->responses[$component::getName()] = $component();
        } elseif (is_subclass_of($component, SchemaComponent::class)) {
            $this->components->schemas[$component::getName()] = $component();
        } elseif (is_subclass_of($component, SecuritySchemeComponent::class)) {
            $this->components->securitySchemes[$component::getName()] = $component();
        } else {
            throw new GenerateBuilderException('Not a valid Component');
        }
        return $this;
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
