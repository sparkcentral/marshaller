<?php
namespace Sparkcentral\Marshaller\KeyTransformer;

use Sparkcentral\Marshaller\KeyTransformer;

/**
 * Transforms camelCase separated words to underscore_separated.
 *
 * Note! Does not support strings with sequences of uppercase letters, e.g. someAPIEndpoint => some_apiendpoint
 */
final class CamelCaseToUnderscoreKeyTransformer implements KeyTransformer
{
    /**
     * @inheritdoc
     */
    public function transform($key)
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
    }
}
