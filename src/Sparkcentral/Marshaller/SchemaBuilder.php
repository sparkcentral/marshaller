<?php
namespace Sparkcentral\Marshaller;

use Sparkcentral\Marshaller\Field\PassThroughField;
use Sparkcentral\Marshaller\KeyTransformer\CamelCaseToUnderscoreKeyTransformer;

/**
 * Builder for schemas.
 */
class SchemaBuilder
{
    /**
     * @var Field[]
     */
    private $fields = [];

    /**
     * @param string $classFqn
     * @param array $excludeProperties
     * @param KeyTransformer|null $keyTransformer
     *
     * @return static
     */
    public static function fromClassProperties($classFqn, array $excludeProperties = [], KeyTransformer $keyTransformer = null)
    {
        $keyTransformer = is_null($keyTransformer) ? new CamelCaseToUnderscoreKeyTransformer() : $keyTransformer;

        $instance = new static();
        $reflectionClass = new \ReflectionClass($classFqn);
        foreach ($reflectionClass->getProperties() as $property) {
            if ($property->isStatic()) {
                continue;
            }
            $propertyName = $property->getName();
            if (in_array($propertyName, $excludeProperties)) {
                continue;
            }
            $name = is_null($keyTransformer) ? $propertyName : $keyTransformer->transform($propertyName);
            $instance->addField(new PassThroughField($propertyName, $name));
        }

        return $instance;
    }

    /**
     * @param Field $field
     */
    public function addField(Field $field)
    {
        $this->fields[] = $field;
    }

    /**
     * @return Schema
     */
    public function build()
    {
        return new Schema(...$this->fields);
    }
}
