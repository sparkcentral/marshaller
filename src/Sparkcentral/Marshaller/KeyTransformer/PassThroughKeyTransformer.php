<?php
namespace Sparkcentral\Marshaller\KeyTransformer;

use Sparkcentral\Marshaller\KeyTransformer;

/**
 *
 */
final class PassThroughKeyTransformer implements KeyTransformer
{

    public function transform($key)
    {
        return $key;
    }
}
