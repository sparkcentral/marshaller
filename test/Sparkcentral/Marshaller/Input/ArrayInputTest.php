<?php
namespace Sparkcentral\Marshaller\Input;

class ArrayInputTest extends \PHPUnit_Framework_TestCase
{
    public function testGetKey()
    {
        $input = new ArrayInput(['id' => 423]);
        $this->assertEquals(423, $input->get('id'));
    }

    public function testGetKeyWhichDoesNotExist()
    {
        $input = new ArrayInput(['id' => 423]);
        $this->setExpectedException(\RuntimeException::class, 'No key boom set in input data.');
        $input->get('boom');
    }
}
