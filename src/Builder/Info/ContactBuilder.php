<?php

namespace Itwmw\OpenApi\Builder\Info;

use Itwmw\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\OpenApi\Builder\Support\Instance;
use Itwmw\OpenApi\Core\Definition\Info\Contact;

/**
 * Class ContactBuilder
 * @method $this name(string $name);
 * @method $this url(string $url);
 * @method $this email(string $email);
 * @method Contact getSubject();
 * @package Itwmw\OpenApi\Builder
 */
class ContactBuilder extends BaseBuilder
{
    use Instance;
    
    protected string $subjectClass = Contact::class;
}
