<?php

namespace Itwmw\Generate\OpenApi\Builder\Path;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Operation\OperationBuilder;
use Itwmw\Generate\OpenApi\Builder\Support\Instance;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Reference;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Operation;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\Generate\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class PathItemBuilder
 * @method $this ref(string $ref);
 * @method $this summary(string $summary);
 * @method $this description(string $description);
 *
 * @method $this get(Operation|OperationBuilder|callable $get);
 * @method $this put(Operation|OperationBuilder|callable $put);
 * @method $this post(Operation|OperationBuilder|callable $post);
 * @method $this delete(Operation|OperationBuilder|callable $delete);
 * @method $this options(Operation|OperationBuilder|callable $options);
 * @method $this head(Operation|OperationBuilder|callable $head);
 * @method $this patch(Operation|OperationBuilder|callable $patch);
 * @method $this trace(Operation|OperationBuilder|callable $trace);
 *
 * @method $this servers(Server[] $servers);
 * @method $this parameters(Parameter[]|Reference[] $parameters);

 * @package Itwmw\Generate\OpenApi\Builder\Path
 */
class PathItemBuilder
{
    use Instance;

    protected PathItem $pathItem;

    public function __construct()
    {
        $this->pathItem = new PathItem();
    }

    /**
     * @param string $method
     * @param Operation|OperationBuilder|callable $operation
     * @return $this
     * @throws GenerateBuilderException
     */
    protected function addMethod(string $method, $operation): PathItemBuilder
    {
        $operation               = Common::getOperation($operation);
        $this->pathItem->$method = $operation;
        return $this;
    }

    public function getPathItem(): PathItem
    {
        return $this->pathItem;
    }

    public function __call($name, $arguments)
    {
        if (property_exists(PathItem::class, $name) && !empty($arguments)) {
            $method = ['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'];
            if (in_array($name, $method)) {
                $this->addMethod($name, $arguments[0]);
                return $this;
            }
            $this->pathItem->$name = $arguments[0];
            return $this;
        }
        throw new GenerateBuilderException('Method does not exist or parameter is empty');
    }
}
