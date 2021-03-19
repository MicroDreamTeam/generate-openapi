<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
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

/**
 * Class ComponentsBuilder
 * @package Itwmw\Generate\OpenApi\Builder
 */
class ComponentsBuilder extends BaseBuilder
{
    protected string $subjectClass = Components::class;

    use Instance;

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
            $this->subject->callbacks[$component::getName()] = $component();
        } elseif (is_subclass_of($component, ExampleComponent::class)) {
            $this->subject->examples[$component::getName()] = $component();
        } elseif (is_subclass_of($component, HeaderComponent::class)) {
            $this->subject->headers[$component::getName()] = $component();
        } elseif (is_subclass_of($component, LinkComponent::class)) {
            $this->subject->links[$component::getName()] = $component();
        } elseif (is_subclass_of($component, ParameterComponent::class)) {
            $this->subject->parameters[$component::getName()] = $component();
        } elseif (is_subclass_of($component, RequestBodyComponent::class)) {
            $this->subject->requestBodies[$component::getName()] = $component();
        } elseif (is_subclass_of($component, ResponseComponent::class)) {
            $this->subject->responses[$component::getName()] = $component();
        } elseif (is_subclass_of($component, SchemaComponent::class)) {
            $this->subject->schemas[$component::getName()] = $component();
        } elseif (is_subclass_of($component, SecuritySchemeComponent::class)) {
            $this->subject->securitySchemes[$component::getName()] = $component();
        } else {
            throw new GenerateBuilderException('Not a valid Component');
        }
        return $this;
    }

    /**
     * @param string $name
     * @param callable|SchemaBuilder|Schema $schema The closure will pass a SchemaBuilder object
     * @return $this
     */
    public function addSchemas(string $name, $schema): ComponentsBuilder
    {
        $this->subject->schemas[$name] = Common::getSchema($schema);
        return $this;
    }
}
