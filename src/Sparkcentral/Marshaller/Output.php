<?php
namespace Sparkcentral\Marshaller;

use Sparkcentral\Marshaller\Output\ArrayOutput;
use Sparkcentral\Marshaller\Output\StdClassOutput;

abstract class Output
{
    /**
     * @param string $type Type of the output. Can be one of:
     *  - 'array'
     *  - \stdClass::class
     *  - Custom class FQN extending Output
     *
     * @return Output
     */
    public static function create($type)
    {
        if ($type === 'array') {
            return new ArrayOutput();
        } elseif ($type === 'stdClass') {
            return new StdClassOutput();
        } elseif (class_exists($type)) {
            $reflectionClass = new \ReflectionClass($type);
            if ($reflectionClass->isSubclassOf(Output::class)) {
                return $reflectionClass->newInstance();
            }
        }

        throw new \InvalidArgumentException('Invalid output type provided: ' . $type);
    }

    abstract public function set($key, $value);

    abstract public function raw();
}
