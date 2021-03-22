<?php

namespace Itwmw\OpenApi\Builder\Common;

use Itwmw\OpenApi\Builder\Info\ComponentsBuilder;
use Itwmw\OpenApi\Builder\Info\ContactBuilder;
use Itwmw\OpenApi\Builder\Info\ExampleBuilder;
use Itwmw\OpenApi\Builder\Info\ExternalDocumentationBuilder;
use Itwmw\OpenApi\Builder\Info\InfoBuilder;
use Itwmw\OpenApi\Builder\Info\LicenseBuilder;
use Itwmw\OpenApi\Builder\Info\MediaTypesBuilder;
use Itwmw\OpenApi\Builder\Info\ReferenceBuilder;
use Itwmw\OpenApi\Builder\Info\TagBuilder;
use Itwmw\OpenApi\Builder\Path\OperationBuilder;
use Itwmw\OpenApi\Builder\Path\Params\DiscriminatorBuilder;
use Itwmw\OpenApi\Builder\Path\Params\ParameterBuilder;
use Itwmw\OpenApi\Builder\Path\Params\SchemaBuilder;
use Itwmw\OpenApi\Builder\Path\Params\XmlBuilder;
use Itwmw\OpenApi\Builder\Path\PathItemBuilder;
use Itwmw\OpenApi\Builder\Path\PathsBuilder;
use Itwmw\OpenApi\Builder\Server\Request\CallbackBuilder;
use Itwmw\OpenApi\Builder\Server\Request\EncodingBuilder;
use Itwmw\OpenApi\Builder\Server\Request\HeaderBuilder;
use Itwmw\OpenApi\Builder\Server\Request\LinkBuilder;
use Itwmw\OpenApi\Builder\Server\Request\RequestBodyBuilder;
use Itwmw\OpenApi\Builder\Server\Request\ResponseBuilder;
use Itwmw\OpenApi\Builder\Server\Request\ResponsesBuilder;
use Itwmw\OpenApi\Builder\Server\Request\SecurityRequirementBuilder;
use Itwmw\OpenApi\Builder\Server\ServerBuilder;
use Itwmw\OpenApi\Builder\Server\ServerVariableBuilder;
use Itwmw\OpenApi\Core\Definition\Info\Components;
use Itwmw\OpenApi\Core\Definition\Info\Contact;
use Itwmw\OpenApi\Core\Definition\Info\Example;
use Itwmw\OpenApi\Core\Definition\Info\ExternalDocumentation;
use Itwmw\OpenApi\Core\Definition\Info\Info;
use Itwmw\OpenApi\Core\Definition\Info\License;
use Itwmw\OpenApi\Core\Definition\Info\MediaTypes;
use Itwmw\OpenApi\Core\Definition\Info\Reference;
use Itwmw\OpenApi\Core\Definition\Info\Tag;
use Itwmw\OpenApi\Core\Definition\Path\Operation;
use Itwmw\OpenApi\Core\Definition\Path\Params\Discriminator;
use Itwmw\OpenApi\Core\Definition\Path\Params\Parameter;
use Itwmw\OpenApi\Core\Definition\Path\Params\Schema;
use Itwmw\OpenApi\Core\Definition\Path\Params\Xml;
use Itwmw\OpenApi\Core\Definition\Path\PathItem;
use Itwmw\OpenApi\Core\Definition\Path\Paths;
use Itwmw\OpenApi\Core\Definition\Server\Request\Callback;
use Itwmw\OpenApi\Core\Definition\Server\Request\Encoding;
use Itwmw\OpenApi\Core\Definition\Server\Request\Header;
use Itwmw\OpenApi\Core\Definition\Server\Request\Link;
use Itwmw\OpenApi\Core\Definition\Server\Request\RequestBody;
use Itwmw\OpenApi\Core\Definition\Server\Request\Response;
use Itwmw\OpenApi\Core\Definition\Server\Request\Responses;
use Itwmw\OpenApi\Core\Definition\Server\Request\SecurityRequirement;
use Itwmw\OpenApi\Core\Definition\Server\Server;
use Itwmw\OpenApi\Core\Definition\Server\ServerVariable;
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
 * @method static Example               getExample(Example|ExampleBuilder|callable $example)
 * @method static Reference             getReference(Reference|ReferenceBuilder|callable $reference)
 * @method static Tag                   getTag(Tag|TagBuilder|callable $tag)
 * @method static Parameter             getParameter(Parameter|ParameterBuilder|callable $parameter)
 * @method static Discriminator         getDiscriminator(Discriminator|DiscriminatorBuilder|callable $discriminator)
 * @method static Xml                   getXml(Xml|XmlBuilder|callable $xml)
 * @method static Callback              getCallback(Callback|CallbackBuilder|callable $callbackBuilder)
 * @method static Encoding              getEncoding(Encoding|EncodingBuilder|callable $encoding)
 * @method static Header                getHeader(Header|HeaderBuilder|callable $header)
 * @method static Link                  getLink(Link|LinkBuilder|callable $link)
 * @method static ServerVariable        getServerVariable(ServerVariable|ServerVariableBuilder|callable $serverVariable)
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
        'Example'               => Example::class,
        'Reference'             => Reference::class,
        'Tag'                   => Tag::class,
        'Parameter'             => Parameter::class,
        'Discriminator'         => Discriminator::class,
        'Xml'                   => Xml::class,
        'Callback'              => Callback::class,
        'Encoding'              => Encoding::class,
        'Header'                => Header::class,
        'Link'                  => Link::class,
        'ServerVariable'        => ServerVariable::class,
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
