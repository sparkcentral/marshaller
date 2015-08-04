<?php
namespace Sparkcentral\Marshaller\Field;

use Sparkcentral\Marshaller\Input\ArrayInput;
use Sparkcentral\Marshaller\Output\ArrayOutput;

class PassThroughFieldTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PassThroughField
     */
    private $field;

    protected function setUp()
    {
        $this->field = new PassThroughField('a', 'b');
    }

    public function testApply()
    {
        $input = new ArrayInput(['a' => 'ar']);
        $output = new ArrayOutput();
        $this->field->marshal($input, $output);
        $this->assertEquals(['b' => 'ar'], $output->raw());
    }

    public function testUnapply()
    {
        $input = new ArrayInput(['b' => 'ar']);
        $output = new ArrayOutput();
        $this->field->unmarshal($input, $output);
        $this->assertEquals(['a' => 'ar'], $output->raw());
    }
}
