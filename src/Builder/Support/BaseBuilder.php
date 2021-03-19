<?php

namespace Itwmw\Generate\OpenApi\Builder\Support;

use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

class BaseBuilder
{
    protected string $subjectClass = '';

    protected $subject;

    public function __construct()
    {
        $this->subject = new $this->subjectClass;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function toArray()
    {
        return $this->getSubject()->toArray();
    }

    public function __call($name, $arguments)
    {
        if (property_exists($this->subjectClass, $name) && !empty($arguments)) {
            $this->subject->$name = $arguments[0];
            return $this;
        }
        throw new GenerateBuilderException('Method does not exist or parameter is empty');
    }
}
