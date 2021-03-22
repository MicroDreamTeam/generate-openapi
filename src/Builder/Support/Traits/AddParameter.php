<?php

namespace Itwmw\OpenApi\Builder\Support\Traits;

use Itwmw\OpenApi\Builder\Common\Common;
use Itwmw\OpenApi\Builder\Path\Params\ParameterBuilder;
use Itwmw\OpenApi\Builder\Support\Interfaces\ParameterComponent;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Path\Params\Parameter;

trait AddParameter
{
    /**
     * @param Parameter|ParameterBuilder|callable|ParameterComponent|Reference $parameter
     * The closure will pass a ParameterBuilder object
     * @return $this
     */
    public function addParameters($parameter)
    {
        if (is_subclass_of($parameter, ParameterComponent::class)) {
            $this->subject->parameters[] = $parameter::getRef();
            return $this;
        }

        if ($parameter instanceof Reference) {
            $this->subject->parameters[] = $parameter;
            return $this;
        }

        $this->subject->parameters[] = Common::getParameter($parameter);
        return $this;
    }
}
