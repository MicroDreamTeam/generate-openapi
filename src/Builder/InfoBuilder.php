<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Builder\Common\Common;
use Itwmw\Generate\OpenApi\Builder\Support\BaseBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Contact;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Info;
use Itwmw\Generate\OpenApi\Core\Definition\Info\License;

/**
 * Class InfoBuilder
 * @method $this title(string $title);
 * @method $this description(string $description);
 * @method $this termsOfService(string $termsOfService);
 * @method $this version(string $version);
 * @package Itwmw\Generate\OpenApi\Builder
 */
class InfoBuilder extends BaseBuilder
{
    protected string $subjectClass = Info::class;

    /**
     * @param Contact|ContactBuilder|callable $contact The closure will pass a ContactBuilder object
     * @return $this
     */
    public function contact($contact)
    {
        $this->subject->contact = Common::getContact($contact);
        return $this;
    }

    /**
     * @param License|LicenseBuilder|callable $license The closure will pass a LicenseBuilder object
     * @return $this
     */
    public function license($license)
    {
        $this->subject->license = Common::getLicense($license);
        return $this;
    }
}
