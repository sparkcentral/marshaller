<?php
namespace Sparkcentral\Marshaller;

use Sparkcentral\Marshaller\Input\ArrayInput;
use Sparkcentral\Marshaller\Input\StdClassInput;

class CustomTestInput extends Input
{
    public function get($key) {}
}

class InputTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateArrayInput()
    {
        $input = Input::create(['foo' => 'bar']);
        $this->assertInstanceOf(ArrayInput::class, $input);
    }

    public function testCreateStdClassInput()
    {
        $input = Input::create((object)['foo' => 'bar']);
        $this->assertInstanceOf(StdClassInput::class, $input);
    }

    public function testCreateCustomInput()
    {
        $input = Input::create(new CustomTestInput());
        $this->assertInstanceOf(CustomTestInput::class, $input);
    }

    public function testCreateInputFailsOnInvalidCustomInput()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Invalid input data type provided: object');
        Input::create(new \DateTime());
    }
}
