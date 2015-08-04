<?php
namespace Sparkcentral\Marshaller\Input;

use Sparkcentral\Marshaller\Input;

final class StdClassInput extends Input
{
    /**
     * @var \stdClass
     */
    private $data;

    /**
     * @param \stdClass $data
     */
    public function __construct(\stdClass $data)
    {
        $this->data = $data;
    }

    public function get($key)
    {
        if (property_exists($this->data, $key)) {
            return $this->data->{$key};
        } else {
            throw new \RuntimeException("No key $key set in input data.");
        }
    }
}
