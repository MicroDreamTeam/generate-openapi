<?php

namespace Itwmw\OpenApi\Builder\Server\Request;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Server\Request\Encoding;

/**
 * Class EncodingBuilder
 * @method $this contentType(string $contentType);
 * @method $this headers(array $headers);
 * @method $this style(string $style);
 * @method $this explode(bool $explode);
 * @method $this allowReserved(bool $allowReserved);
 * @method Encoding getSubject();
 * @package Itwmw\OpenApi\Builder\Server\Request
 */
class EncodingBuilder extends BaseBuilder
{
    use Instance;

    protected string $subjectClass = Encoding::class;
}
