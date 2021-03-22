<?php

namespace Itwmw\OpenApi\Builder\Server;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Server\ServerVariable;

/**
 * Class ServerVariableBuilder
 * @method $this enum(array $enum);
 * @method $this default(string $default);
 * @method $this description(string $description);
 * @method ServerVariable getSubject();
 * @package Itwmw\OpenApi\Builder\Server
 */
class ServerVariableBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = ServerVariable::class;
}
