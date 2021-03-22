<?php

namespace Itwmw\OpenApi\Builder\Map;

use Itwmw\OpenApi\Builder\Common\DataType;
use Itwmw\OpenApi\Builder\Path\Params\SchemaBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class MapSchemaBuilder
 * @method SchemaBuilder integer(string $fileName);
 * @method SchemaBuilder array(string $fileName);
 * @method SchemaBuilder object(string $fileName);
 * @method SchemaBuilder long(string $fileName);
 * @method SchemaBuilder float(string $fileName);
 * @method SchemaBuilder double(string $fileName);
 * @method SchemaBuilder string(string $fileName);
 * @method SchemaBuilder byte(string $fileName);
 * @method SchemaBuilder binary(string $fileName);
 * @method SchemaBuilder boolean(string $fileName);
 * @method SchemaBuilder date(string $fileName);
 * @method SchemaBuilder dateTime(string $fileName);
 * @method SchemaBuilder password(string $fileName);
 *
 * @package Itwmw\OpenApi\Builder\Schema
 */
class MapSchemaBuilder
{
    use Instance;

    /** @var SchemaBuilder[]  */
    protected array $params;

    public function getSubject(): array
    {
        $_params = $this->params;
        foreach ($_params as $name => &$param) {
            $param = $param->getSubject();
        }
        return $_params;
    }

    public function __call($name, $arguments)
    {
        if (method_exists(DataType::class, $name) && !empty($arguments)) {
            $schemaBuilder = new SchemaBuilder();
            $schemaBuilder->$name();
            $this->params[$arguments[0]] = $schemaBuilder;
            return $schemaBuilder;
        } else {
            throw new GenerateBuilderException('Method does not exist or parameter is empty');
        }
    }
}
