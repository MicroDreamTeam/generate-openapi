<?php

namespace Itwmw\OpenApi\Builder\Path\Params;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Common\DataType;
use Itwmw\OpenApi\Builder\Map\MapSchemaBuilder;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Traits\SetExternalDocumentation;
use Itwmw\OpenApi\Core\Definition\Info\DataTypeContainers;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Path\Params\Discriminator;
use Itwmw\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\OpenApi\Core\Definition\Path\Params\Xml;
use Itwmw\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class SchemaBuilder
 * @method $this integer();
 * @method $this array();
 * @method $this object();
 * @method $this long();
 * @method $this float();
 * @method $this double();
 * @method $this string();
 * @method $this byte();
 * @method $this binary();
 * @method $this boolean();
 * @method $this date();
 * @method $this dateTime();
 * @method $this password();
 *
 * @method $this nullable(bool $nullable);
 * @method $this discriminator(Discriminator $discriminator);
 * @method $this readOnly(bool $readOnly);
 * @method $this writeOnly(bool $writeOnly);
 * @method $this xml(Xml $xml);
 * @method $this example(array $example);
 * @method $this deprecated(bool $deprecated);
 * @method $this title(string $title);
 * @method $this description(string $description);
 * @method $this multipleOf(?float|null $multipleOf);
 * @method $this maximum(?float|null $maximum);
 * @method $this exclusiveMaximum(bool|float|null $exclusiveMaximum);
 * @method $this minimum(?float|null $minimum);
 * @method $this exclusiveMinimum(bool|float $exclusiveMinimum);
 * @method $this maxLength(?int|null $maxLength);
 * @method $this properties(array $properties);
 * @method $this minLength(?int|null $minLength);
 * @method $this pattern(?string|null $pattern);
 * @method $this additionalItems(bool|Schema $additionalItems);
 * @method $this maxItems(?int|null $maxItems);
 * @method $this minItems(?int|null $minItems);
 * @method $this uniqueItems(?bool|null $uniqueItems);
 * @method $this maxProperties(int $maxProperties);
 * @method $this minProperties(int $minProperties);
 * @method $this required(string[]|bool $required);
 * @method $this additionalProperties(bool|Schema|Reference $additionalProperties);
 * @method $this definitions(Schema[] $definitions);
 * @method $this patternProperties(Schema[] $patternProperties);
 * @method $this dependencies(Schema[]|string[][]|array[] $dependencies);
 * @method $this enum(array $enum);
 * @method $this type(string|DataTypeContainers $type);
 * @method $this format(?string|null $format);
 * @method $this allOf(Schema[]|array|Reference[] $allOf);
 * @method $this anyOf(Schema[]|array|Reference[] $anyOf);
 * @method $this oneOf(Schema[]|array|Reference[] $oneOf);
 * @method $this not(Schema[]|array|Reference[] $not);
 * @method $this contains(Schema $contains);
 * @method $this propertyNames(Schema $propertyNames);
 * @method $this if(Schema $if);
 * @method $this then(Schema $then);
 * @method $this else(Schema $else);
 * @method $this contentMediaType(string $contentMediaType);
 * @method $this contentEncoding(string $contentEncoding);
 * @method Schema getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class SchemaBuilder extends BaseBuilder
{
    use Instance,SetExternalDocumentation;

    protected string $subjectClass = Schema::class;

    /**
     * @param string|callable|MapSchemaBuilder $name   The closure will pass a MapSchemaBuilder object
     *                                                 If the parameter type is a string, the parameter $schema must not be null.
     * @param SchemaBuilder|Schema|callable    $schema The closure will pass a SchemaBuilder object
     * @return $this
     * @throws GenerateBuilderException
     */
    public function addProperties($name, $schema = null): SchemaBuilder
    {
        if (is_string($name)) {
            $this->subject->properties[$name] = Common::getSchema($schema);
            return $this;
        } elseif (is_callable($name)) {
            $schema = new MapSchemaBuilder();
            call_user_func($name, $schema);
        } elseif ($name instanceof MapSchemaBuilder) {
            $schema = $name;
        } else {
            throw new GenerateBuilderException('Not valid parameters');
        }

        $schema                    = $schema->getSubject();
        $this->subject->properties = array_merge($this->subject->properties, $schema);
        return $this;
    }

    /**
     * @param SchemaBuilder|callable|Schema|Reference $items The closure will pass a SchemaBuilder object
     * @return $this
     */
    public function items($items): SchemaBuilder
    {
        if ($items instanceof Reference) {
            $this->subject->items = $items;
            return $this;
        }
        $this->subject->items = Common::getSchema($items);
        return $this;
    }

    public function __call($name, $arguments)
    {
        if (method_exists(DataType::class, $name)) {
            $this->subject->type = DataType::$name();
            return $this;
        }

        return parent::__call($name, $arguments);
    }
}
