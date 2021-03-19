<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;

/**
 * Class ServerBuilder
 * @method $this url(string $url);
 * @method $this description(string $description);
 * @method $this variables(array $variables);
 * @method Server getSubject();
 * @package Itwmw\Generate\OpenApi\Builder
 */
class ServerBuilder extends BaseBuilder
{
    protected string $subjectClass = Server::class;
}
