<?php

namespace Itwmw\OpenApi\Core\Definition\Server\Request;

use Itwmw\OpenApi\Core\Definition\Path\Params\Parameter;

/**
 * The Header Object follows the structure of the Parameter Object with the following changes:
 * - `name` MUST NOT be specified, it is given in the corresponding `headers` map.
 * - `in` MUST NOT be specified, it is implicitly in `header`.
 * - All traits that are affected by the location MUST be applicable to a location of `header`
 * @package Itwmw\OpenApi\Core\Definition\Server\Request
 */
class Header extends Parameter
{
}
