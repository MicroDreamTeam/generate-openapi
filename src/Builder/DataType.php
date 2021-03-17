<?php

namespace Itwmw\Generate\OpenApi\Builder;

use Itwmw\Generate\OpenApi\Core\Definition\Info\DataTypeContainers;

/**
 * Data Types
 *
 * Primitive data types in the OAS are based on the types supported by the JSON Schema Specification Wright Draft 00.
 * Note that integer as a type is also supported and is defined as a JSON number without a fraction or exponent part.
 * null is not supported as a type. Models are defined using the Schema Object,
 * which is an extended subset of JSON Schema Specification Wright Draft 00.
 *
 * Primitives have an optional modifier property: format. OAS uses several known formats to define in
 * fine detail the data type being used. However, to support documentation needs, the format property
 * is an open string-valued property, and can have any value. Formats such as "email", "uuid",
 * and so on, MAY be used even though undefined by this specification. Types that are not accompanied by
 * a format property follow the type definition in the JSON Schema. Tools that do not recognize
 * a specific format MAY default back to the type alone, as if the format is not specified.
 * @see https://tools.ietf.org/html/draft-wright-json-schema-00#section-4.2
 * @package Itwmw\Generate\OpenApi\Core\Definition
 */
class DataType
{
    /**
     * signed 32 bits
     * @return DataTypeContainers
     */
    public static function integer(): DataTypeContainers
    {
        return new DataTypeContainers('integer', 'int32');
    }

    /**
     * signed 64 bits (a.k.a long)
     * @return DataTypeContainers
     */
    public static function long(): DataTypeContainers
    {
        return new DataTypeContainers('integer', 'int32');
    }

    public static function float(): DataTypeContainers
    {
        return new DataTypeContainers('number', 'float');
    }

    public static function double(): DataTypeContainers
    {
        return new DataTypeContainers('number', 'double');
    }

    public static function string(): DataTypeContainers
    {
        return new DataTypeContainers('string');
    }

    /**
     * 	base64 encoded characters
     * @return DataTypeContainers
     */
    public static function byte(): DataTypeContainers
    {
        return new DataTypeContainers('string', 'byte');
    }

    /**
     * any sequence of octets
     * @return DataTypeContainers
     */
    public static function binary(): DataTypeContainers
    {
        return new DataTypeContainers('string', 'binary');
    }

    public static function boolean(): DataTypeContainers
    {
        return new DataTypeContainers('boolean');
    }

    /**
     * As defined by full-date
     * @see http://xml2rfc.ietf.org/public/rfc/html/rfc3339.html#anchor14
     * @return DataTypeContainers
     */
    public static function date(): DataTypeContainers
    {
        return new DataTypeContainers('string', 'date');
    }

    /**
     * As defined by date-time
     * @see https://xml2rfc.tools.ietf.org/public/rfc/html/rfc3339.html#anchor14
     * @return DataTypeContainers
     */
    public static function dateTime(): DataTypeContainers
    {
        return new DataTypeContainers('string', 'date-time');
    }

    /**
     * A hint to UIs to obscure input.
     * @return DataTypeContainers
     */
    public static function password(): DataTypeContainers
    {
        return new DataTypeContainers('string', 'password');
    }
}
