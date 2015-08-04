<?php
namespace Sparkcentral\Marshaller\Input;

use Sparkcentral\Marshaller\Input;

/**
 * Represents input given as PHP array.
 */
final class ArrayInput extends Input
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function get($key)
    {
        if (isset($this->data[$key]) || array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } else {
            throw new \RuntimeException("No key $key set in input data.");
        }
    }
}
