<?php

namespace Itwmw\OpenApi\Builder\Support\Traits;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Server\ServerBuilder;
use Itwmw\OpenApi\Core\Definition\Server\Server;

trait AddServer
{
    /**
     * @param Server|ServerBuilder|callable $server
     * The closure will pass a ServerBuilder object
     * @return $this
     */
    public function addServer($server)
    {
        $this->subject->servers[] = Common::getServer($server);
        return $this;
    }
}
