<?php
namespace Sparkcentral\Marshaller\KeyTransformer;

class CamelCaseToUnderscoreKeyTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $transformer = new CamelCaseToUnderscoreKeyTransformer();
        $result = $transformer->transform('someCamelCaseString');
        $this->assertEquals('some_camel_case_string', $result);
    }
}
