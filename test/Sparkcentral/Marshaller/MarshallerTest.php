<?php
namespace Sparkcentral\Marshaller;

use Sparkcentral\Marshaller\Field\PassThroughField;

class MarshallerTest extends \PHPUnit_Framework_TestCase
{
    use Marshaller;

    public function testMarshal()
    {
        $data = (object) ['id' => 32, 'fullName' => 'Hakuna Matata'];
        $schema = new Schema(new PassThroughField('id', 'id'), new PassThroughField('fullName', 'full_name'));
        $result = $this->marshal($data, $schema);
        $this->assertEquals(['id' => 32, 'full_name' => 'Hakuna Matata'], $result);
    }

    public function testUnmarshal()
    {
        $expected = (object) ['id' => 32, 'fullName' => 'Hakuna Matata'];
        $input = ['id' => 32, 'full_name' => 'Hakuna Matata'];

        $schema = new Schema(new PassThroughField('id', 'id'), new PassThroughField('fullName', 'full_name'));
        $result = $this->unmarshal($input, $schema);
        $this->assertEquals($expected, $result);
    }
}
