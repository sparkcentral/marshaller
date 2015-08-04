<?php
namespace Sparkcentral\Marshaller\Field;

use Sparkcentral\Marshaller\Field;
use Sparkcentral\Marshaller\Input;
use Sparkcentral\Marshaller\Output;

/**
 * Passes through the value between two data structures.
 */
final class PassThroughField implements Field
{
    /**
     * @var string
     */
    private $fromKey;

    /**
     * @var string
     */
    private $toKey;

    /**
     * @param string $fromKey Key name in the source data structure.
     * @param string $toKey Key name in the destination data structure.
     */
    public function __construct($fromKey, $toKey)
    {
        $this->fromKey = $fromKey;
        $this->toKey = $toKey;
    }

    /**
     * @inheritdoc
     */
    public function marshal(Input $input, Output $output)
    {
        $output->set($this->toKey, $input->get($this->fromKey));
    }

    /**
     * @inheritdoc
     */
    public function unmarshal(Input $input, Output $output)
    {
        $output->set($this->fromKey, $input->get($this->toKey));
    }

    /**
     * @return string
     */
    public function getFromKey()
    {
        return $this->fromKey;
    }

    /**
     * @return string
     */
    public function getToKey()
    {
        return $this->toKey;
    }
}
