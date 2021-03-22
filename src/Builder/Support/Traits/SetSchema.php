<?php

namespace Itwmw\OpenApi\Builder\Support\Traits;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Path\Params\SchemaBuilder;
use Itwmw\OpenApi\Builder\Support\Interfaces\SchemaComponent;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Path\Params\Schema;

trait SetSchema
{
    /**
     * @param callable|Schema|Reference|SchemaComponent|SchemaBuilder $schema
     * The closure will pass a SchemaBuilder object
     * @return $this
     */
    public function schema($schema)
    {
        if ($schema instanceof Reference) {
            $this->subject->schema = $schema;
            return $this;
        }

        if ($schema instanceof SchemaComponent) {
            $this->subject->schema = $schema::getRef();
            return $this;
        }

        $this->subject->schema = Common::getSchema($schema);
        return $this;
    }
}
