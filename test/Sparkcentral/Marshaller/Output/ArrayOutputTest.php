<?php
namespace Sparkcentral\Marshaller\Output;

class ArrayOutputTest extends \PHPUnit_Framework_TestCase
{
    public function testSetValue()
    {
        $output = new ArrayOutput();
        $output->set('id', 9882);
        $this->assertEquals(['id' => 9882], $output->raw());
    }
}
