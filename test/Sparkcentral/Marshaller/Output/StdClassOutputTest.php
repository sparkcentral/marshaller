<?php
namespace Sparkcentral\Marshaller\Output;

class StdClassOutputTest extends \PHPUnit_Framework_TestCase
{
    public function testSetValue()
    {
        $expected = new \stdClass();
        $expected->id = 9882;

        $output = new StdClassOutput();
        $output->set('id', 9882);
        $this->assertEquals($expected, $output->raw());
    }
}
