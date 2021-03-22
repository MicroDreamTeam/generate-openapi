<?php

namespace Itwmw\OpenApi\Builder\Server\Request;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Server\ServerBuilder;
use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Server\Request\Link;
use Itwmw\OpenApi\Core\Definition\Server\Server;

/**
 * Class LinkBuilder
 * @method $this operationRef(string $operationRef);
 * @method $this operationId(string $operationId);
 * @method $this parameters(array $parameters);
 * @method $this requestBody(string $requestBody);
 * @method $this description(string $description);
 * @method Link getSubject();
 * @package Itwmw\OpenApi\Builder\Server\Request
 */
class LinkBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Link::class;

    /**
     * @param Server|ServerBuilder|callable $server
     * The closure will pass a ServerBuilder object
     * @return $this
     */
    public function server($server): LinkBuilder
    {
        $this->subject->server = Common::getServer($server);
        return $this;
    }
}
