<?php

namespace Itwmw\OpenApi\Builder\Common;

use Itwmw\OpenApi\Builder\Info\ComponentsBuilder;
use Itwmw\OpenApi\Builder\Info\ContactBuilder;
use Itwmw\OpenApi\Builder\Info\ExternalDocumentationBuilder;
use Itwmw\OpenApi\Builder\Info\InfoBuilder;
use Itwmw\OpenApi\Builder\Info\LicenseBuilder;
use Itwmw\OpenApi\Builder\Info\MediaTypesBuilder;
use Itwmw\OpenApi\Builder\Path\OperationBuilder;
use Itwmw\OpenApi\Builder\Path\Params\SchemaBuilder;
use Itwmw\OpenApi\Builder\Path\PathItemBuilder;
use Itwmw\OpenApi\Builder\Path\PathsBuilder;
use Itwmw\OpenApi\Builder\Server\Request\RequestBodyBuilder;
use Itwmw\OpenApi\Builder\Server\Request\ResponseBuilder;
use Itwmw\OpenApi\Builder\Server\Request\ResponsesBuilder;
use Itwmw\OpenApi\Builder\Server\Request\SecurityRequirementBuilder;
use Itwmw\OpenApi\Builder\Server\ServerBuilder;
use Itwmw\OpenApi\Core\Definition\Info\Components;
use Itwmw\OpenApi\Core\Definition\Info\Contact;
use Itwmw\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\OpenApi\Core\Definition\Info\Info;
use Itwmw\OpenApi\Core\Definition\Info\License;
use Itwmw\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\OpenApi\Core\Definition\Path\Operation;
use Itwmw\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\OpenApi\Core\Definition\Path\Paths;
use Itwmw\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\OpenApi\Core\Definition\Server\Server;
use Itwmw\OpenApi\Core\Exception\GenerateBuilderException;

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
 * @package Itwmw\OpenApi\Builder\Common
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
        if (!isset(self::$subjectClassMap[$subject])) {
            throw new GenerateBuilderException('Call to undefined method ' . $subject . '()');
        }
        $subjectObject = $arguments[0];

        $subjectClass        = self::$subjectClassMap[$subject];
        $subjectBuilderClass = str_replace('Core\Definition', 'Builder', $subjectClass) . 'Builder';
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
