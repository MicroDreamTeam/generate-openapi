<?php

namespace Itwmw\OpenApi\Builder\Server\Request;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Builder\Support\Traits\SetPathItem;
use Itwmw\OpenApi\Core\Definition\Server\Request\Callback;

/**
 * Class CallbackBuilder
 * @method $this expression(string $expression);
 * @method Callback getSubject();
 * @package Itwmw\OpenApi\Builder\Server\Request
 */
class CallbackBuilder extends BaseBuilder
{
    use Instance;

    use SetPathItem;
    
    protected string $subjectClass = Callback::class;
}
