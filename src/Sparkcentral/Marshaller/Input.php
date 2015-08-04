<?php
namespace Sparkcentral\Marshaller;

use Sparkcentral\Marshaller\Input\ArrayInput;
use Sparkcentral\Marshaller\Input\StdClassInput;

abstract class Input
{
    public static function create($data)
    {
        if ($data instanceof \stdClass) {
            return new StdClassInput($data);
        } elseif (is_array($data)) {
            return new ArrayInput($data);
        } elseif ($data instanceof Input) {
            return $data;
        } else {
            throw new \InvalidArgumentException("Invalid input data type provided: " . gettype($data));
        }
    }

    abstract public function get($key);
}
