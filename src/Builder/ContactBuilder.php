<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Contact;

/**
 * Class ContactBuilder
 * @method $this name(string $name);
 * @method $this url(string $url);
 * @method $this email(string $email);
 * @package Itwmw\Generate\OpenApi\Builder
 */
class ContactBuilder extends BaseBuilder
{
    protected string $subjectClass = Contact::class;
}
