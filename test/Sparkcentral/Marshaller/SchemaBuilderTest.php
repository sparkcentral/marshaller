<?php
namespace Sparkcentral\Marshaller;

use Sparkcentral\Marshaller\Field\PassThroughField;

class TestForSchemaBuilder
{
    private static $service; // should be excluded always
    private $fullName;
    private $email;
    private $internalStuff;
}

class SchemaBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testFromClassProperties()
    {
        $schema = SchemaBuilder::fromClassProperties(TestForSchemaBuilder::class)->build();
        $this->assertInstanceOf(Schema::class, $schema);
        $this->assertCount(3, $schema);
        $fromKeys = array_map(function (PassThroughField $field) {
            return $field->getFromKey();
        }, iterator_to_array($schema));
        $this->assertEquals(['fullName', 'email', 'internalStuff'], $fromKeys);
        $toKeys = array_map(function (PassThroughField $field) {
            return $field->getToKey();
        }, iterator_to_array($schema));
        $this->assertEquals(['full_name', 'email', 'internal_stuff'], $toKeys);
    }

    public function testFromClassPropertiesWithExclude()
    {
        $schema = SchemaBuilder::fromClassProperties(TestForSchemaBuilder::class, ['internalStuff'])->build();
        $this->assertInstanceOf(Schema::class, $schema);
        $this->assertCount(2, $schema);
        $fields = iterator_to_array($schema);
        $this->assertEquals('fullName', $fields[0]->getFromKey());
        $this->assertEquals('email', $fields[1]->getFromKey());
    }
}
