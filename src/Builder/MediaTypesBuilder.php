<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Builder\Support\Interfaces\SchemaComponent;
use Itwmw\Generate\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

class MediaTypesBuilder
{
    use Instance;

    protected MediaTypes $mediaTypes;

    public function __construct()
    {
        $this->mediaTypes = new MediaTypes();
    }

    /**
     * @param callable|Schema|Reference|SchemaComponent|SchemaBuilder $schema
     * @return MediaTypesBuilder
     * @throws GenerateBuilderException
     */
    public function schema($schema): MediaTypesBuilder
    {
        if (is_callable($schema)) {
            $schemaBuilder = new SchemaBuilder();
            call_user_func($schema, $schemaBuilder);
            $this->mediaTypes->schema = $schemaBuilder->getSchema();
            return $this;
        }

        if ($schema instanceof Schema || $schema instanceof Reference) {
            $this->mediaTypes->schema = $schema;
            return $this;
        }

        if ($schema instanceof SchemaBuilder) {
            $this->mediaTypes->schema = $schema->getSchema();
            return $this;
        }

        if (is_subclass_of($schema, SchemaComponent::class)) {
            $this->mediaTypes->schema = $schema::getRef();
            return $this;
        }

        throw new GenerateBuilderException('Not a valid Schema');
    }

    /**
     * @param scalar|array $example
     * @return $this
     */
    public function example($example): MediaTypesBuilder
    {
        $this->mediaTypes->example = $example;
        return $this;
    }

    /**
     * ap[ string, {@see Example} ¦ {@see Reference}]
     * @param array $examples
     * @return $this
     */
    public function examples(array $examples): MediaTypesBuilder
    {
        $this->mediaTypes->examples = $examples;
        return $this;
    }

    public function getMediaTypes(): MediaTypes
    {
        return $this->mediaTypes;
    }
}
