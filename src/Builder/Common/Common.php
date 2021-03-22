<?php

namespace Itwmw\Generate\OpenApi\Builder\Common;

use Itwmw\Generate\OpenApi\Builder\ComponentsBuilder;
use Itwmw\Generate\OpenApi\Builder\ContactBuilder;
use Itwmw\Generate\OpenApi\Builder\ExternalDocumentationBuilder;
use Itwmw\Generate\OpenApi\Builder\InfoBuilder;
use Itwmw\Generate\OpenApi\Builder\LicenseBuilder;
use Itwmw\Generate\OpenApi\Builder\MediaTypesBuilder;
use Itwmw\Generate\OpenApi\Builder\OperationBuilder;
use Itwmw\Generate\OpenApi\Builder\PathItemBuilder;
use Itwmw\Generate\OpenApi\Builder\PathsBuilder;
use Itwmw\Generate\OpenApi\Builder\RequestBodyBuilder;
use Itwmw\Generate\OpenApi\Builder\ResponseBuilder;
use Itwmw\Generate\OpenApi\Builder\ResponsesBuilder;
use Itwmw\Generate\OpenApi\Builder\SchemaBuilder;
use Itwmw\Generate\OpenApi\Builder\SecurityRequirementBuilder;
use Itwmw\Generate\OpenApi\Builder\ServerBuilder;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Components;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Contact;
use Itwmw\Generate\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\Generate\OpenApi\Core\Definition\Info\Info;
use Itwmw\Generate\OpenApi\Core\Definition\Info\License;
use Itwmw\Generate\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Operation;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\Generate\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\Generate\OpenApi\Core\Definition\Path\Paths;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\Generate\OpenApi\Core\Definition\Server\Server;
use Itwmw\Generate\OpenApi\Core\Exception\GenerateBuilderException;

/**
 * Class Common
 * @method static PathItem              getPathItem(PathItem|PathItemBuilder|callable $pathItem)
 * @method static Schema                getSchema(Schema|SchemaBuilder|callable $schema)
 * @method static MediaTypes            getMediaTypes(MediaTypes|MediaTypesBuilder|callable $mediaTypes)
 * @method static RequestBody           getRequestBody(RequestBody|RequestBodyBuilder|callable $requestBody)
 * @method static Response              getResponse(Response|ResponseBuilder|callable $response)
 * @method static Responses             getResponses(Responses|ResponsesBuilder|callable $responses)
 * @method static Operation             getOperation(Operation|OperationBuilder|callable $operation)
 * @method static Paths                 getPaths(Paths|PathsBuilder|callable $paths)
 * @method static Components            getComponents(Components|ComponentsBuilder|callable $components)
 * @method static Contact               getContact(Contact|ContactBuilder|callable $contact)
 * @method static License               getLicense(License|LicenseBuilder|callable $license)
 * @method static Info                  getInfo(Info|InfoBuilder|callable $info)
 * @method static Server                getServer(Server|ServerBuilder|callable $server)
 * @method static ExternalDocumentation getExternalDocumentation(ExternalDocumentation|ExternalDocumentationBuilder|callable $externalDocumentation)
 * @method static SecurityRequirement   getSecurityRequirement(SecurityRequirement|SecurityRequirementBuilder|callable $securityRequirement)
 * @package Itwmw\Generate\OpenApi\Builder\Common
 */
class Common
{
    protected static array $subjectClassMap = [
        'PathItem'              => PathItem::class,
        'Schema'                => Schema::class,
        'MediaTypes'            => MediaTypes::class,
        'RequestBody'           => RequestBody::class,
        'Response'              => Response::class,
        'Responses'             => Responses::class,
        'Operation'             => Operation::class,
        'Paths'                 => Paths::class,
        'Components'            => Components::class,
        'Contact'               => Contact::class,
        'License'               => License::class,
        'Info'                  => Info::class,
        'Server'                => Server::class,
        'ExternalDocumentation' => ExternalDocumentation::class,
        'SecurityRequirement'   => SecurityRequirement::class,
    ];
    
    public static function __callStatic($name, $arguments)
    {
        $subject = str_replace('get', '', $name);
        $subject = ucfirst($subject);
        if (empty($arguments)) {
            throw new GenerateBuilderException('Not valid ' . $subject);
        }
        $subjectObject = $arguments[0];

        $subjectBuilderClass = 'Itwmw\Generate\OpenApi\Builder\\' . $subject . 'Builder';

        if ($subjectObject instanceof self::$subjectClassMap[$subject]) {
            return $subjectObject;
        }

        if ($subjectObject instanceof $subjectBuilderClass) {
            return $subjectObject->getSubject();
        }

        if (is_callable($subjectObject)) {
            $builder = new $subjectBuilderClass();
            call_user_func($subjectObject, $builder);
            return $builder->getSubject();
        }

        throw new GenerateBuilderException('Not valid ' . $subject);
    }
}
