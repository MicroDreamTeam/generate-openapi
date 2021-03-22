<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Path\Params\SchemaBuilder;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Interfaces\SchemaComponent;
use Itwmw\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Path\Params\Schema;

/**
 * Class MediaTypesBuilder
 * @method $this example(scalar|array $example);
 * @method $this examples(array $examples);
 * @method $this encoding(array $encoding);

 * @method MediaTypes getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class MediaTypesBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = MediaTypes::class;

    /**
     * @param callable|Schema|Reference|SchemaComponent|SchemaBuilder $schema
     * @return MediaTypesBuilder
     */
    public function schema($schema): MediaTypesBuilder
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
