<?php
namespace Sparkcentral\Marshaller;

final class Schema implements \IteratorAggregate, \Countable
{
    /**
     * @var Field[]
     */
    private $fields;

    /**
     * @param Field|Field[] $fields
     */
    public function __construct(Field ...$fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return Field[]
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->fields);
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->fields);
    }
}
