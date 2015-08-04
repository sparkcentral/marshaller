<?php
namespace Sparkcentral\Marshaller;

/**
 * Interface for transformers of property names in SchemaBuilder.
 *
 * @see SchemaBuilder::fromClassProperties()
 */
interface KeyTransformer
{
    public function transform($key);
}
