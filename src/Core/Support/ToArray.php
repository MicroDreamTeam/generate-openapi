<?php

namespace Itwmw\Generate\OpenApi\Core\Support;

trait ToArray
{
    public function toArray(): array
    {
        $data = (array)$this;
        $data = array_map([$this, 'processData'], $data);
        return array_filter($data);
    }

    protected function processData($value)
    {
        if (is_array($value)) {
            return array_map([$this, 'processData'], array_filter($value));
        }
        if ($value instanceof Arrayable) {
            return $value->toArray();
        }
        return $value;
    }
}
