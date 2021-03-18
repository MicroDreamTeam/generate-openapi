<?php

namespace Itwmw\Generate\OpenApi\Builder\Common;

use Itwmw\Generate\OpenApi\Builder\Schema\SchemaBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

class Common
{
    /**
     * Get the schema object
     * @param SchemaBuilder|Schema|callable $schema The closure will pass a SchemaBuilder object
     * @return Schema
     * @throws GenerateBuilderException
     */
    public static function getSchema($schema): Schema
    {
        if ($schema instanceof SchemaBuilder) {
            $_schema = $schema->getSchema();
        } elseif (is_callable($schema)) {
            $_schema = new SchemaBuilder();
            call_user_func($schema, $_schema);
            $_schema = $_schema->getSchema();
        } elseif ($schema instanceof Schema) {
            $_schema = $schema;
        } else {
            throw new GenerateBuilderException('Not valid schema');
        }
        return $_schema;
    }
}
