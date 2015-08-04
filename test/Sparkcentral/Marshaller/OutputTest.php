<?php
namespace Sparkcentral\Marshaller;

use Sparkcentral\Marshaller\Output\ArrayOutput;
use Sparkcentral\Marshaller\Output\StdClassOutput;

class CustomTestOutput extends Output
{
    public function set($key, $value) {}
    public function raw() {}
}

class OutputTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateArrayOutput()
    {
        $output = Output::create('array');
        $this->assertInstanceOf(ArrayOutput::class, $output);
    }

    public function testCreateStdClassOutput()
    {
        $output = Output::create(\stdClass::class);
        $this->assertInstanceOf(StdClassOutput::class, $output);
    }

    public function testCreateCustomOutput()
    {
        $output = Output::create(CustomTestOutput::class);
        $this->assertInstanceOf(CustomTestOutput::class, $output);
    }

    public function testCreateCustomOutputFromInvalidType()
    {
        $this->setExpectedException(\InvalidArgumentException::class, 'Invalid output type provided: DateTime');
        Output::create(\DateTime::class);
    }
}
