<?php

namespace Itwmw\OpenApi\Builder\Server;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Server\Server;

/**
 * Class ServerBuilder
 * @method $this url(string $url);
 * @method $this description(string $description);
 * @method $this variables(array $variables);
 * @method Server getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class ServerBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Server::class;
}
