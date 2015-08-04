<?php
namespace Sparkcentral\Marshaller\Output;

use Sparkcentral\Marshaller\Output;

/**
 * Formats output as \stdClass objects.
 */
final class StdClassOutput extends Output
{
    /**
     * @var \stdClass
     */
    private $data;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->data = new \stdClass();
    }

    /**
     * @inheritdoc
     */
    public function set($key, $value)
    {
        $this->data->{$key} = $value;
    }

    /**
     * @return \stdClass
     */
    public function raw()
    {
        return $this->data;
    }
}
