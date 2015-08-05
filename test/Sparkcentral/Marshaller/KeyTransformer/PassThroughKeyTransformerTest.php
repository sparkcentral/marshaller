<?php
namespace Sparkcentral\Marshaller\KeyTransformer;

class PassThroughKeyTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $transformer = new PassThroughKeyTransformer();
        $result = $transformer->transform('someCamelCaseString');
        $this->assertEquals('someCamelCaseString', $result);
    }
}
