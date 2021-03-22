<?php

namespace Itwmw\OpenApi\Builder\Path;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Traits\AddParameter;
use Itwmw\OpenApi\Builder\Support\Traits\AddServer;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Path\Operation;
use Itwmw\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\OpenApi\Core\Definition\Server\Server;

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

 * @method PathItem getSubject();
 * @package Itwmw\OpenApi\Builder\Path
 */
class PathItemBuilder extends BaseBuilder
{
    use Instance;
    use AddParameter,AddServer;

    protected string $subjectClass = PathItem::class;

    /**
     * @param string $method
     * @param Operation|OperationBuilder|callable $operation  The closure will pass a OperationBuilder object
     * @return $this
     */
    protected function addMethod(string $method, $operation): PathItemBuilder
    {
        $operation              = Common::getOperation($operation);
        $this->subject->$method = $operation;
        return $this;
    }

    public function __call($name, $arguments)
    {
        $method = ['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'];
        if (in_array($name, $method)) {
            $this->addMethod($name, $arguments[0]);
            return $this;
        }
        return parent::__call($name, $arguments);
    }
}
