<?php

namespace Itwmw\OpenApi\Core\Definition\Info;

class DataTypeContainers
{
    public string $type = '';

    public string $format = '';

    public function __construct(string $type, string $format = '')
    {
        $this->type   = $type;
        $this->format = $format;
    }
}
