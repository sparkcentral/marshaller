<?php
namespace Sparkcentral\Marshaller\Output;

use Sparkcentral\Marshaller\Output;

final class ArrayOutput extends Output
{
    private $data = [];

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function raw()
    {
        return $this->data;
    }
}
