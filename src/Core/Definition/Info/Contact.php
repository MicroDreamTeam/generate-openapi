<?php

namespace Itwmw\OpenApi\Core\Definition\Info;

use Itwmw\OpenApi\Core\Support\Arrayable;
use Itwmw\OpenApi\Core\Support\ToArray;

/**
 * Contact information for the exposed API.
 * @package Itwmw\OpenApi\Core\Definition\Info
 */
class Contact implements Arrayable
{
    use ToArray;
    /**
     * The identifying name of the contact person/organization.
     * @var string
     */
    public string $name;

    /**
     * The URL pointing to the contact information. This MUST be in the form of a URL.
     * @var string
     */
    public string $url;

    /**
     * The email address of the contact person/organization. This MUST be in the form of an email address.
     * @var string
     */
    public string $email;
}
