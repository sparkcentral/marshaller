<?php
namespace Sparkcentral\Marshaller;

/**
 * Represents single field in marshalling schema. Provides interface to transform data in both directions.
 */
interface Field
{
    /**
     * @param Input $input
     * @param Output $output
     *
     * @return void
     */
    public function marshal(Input $input, Output $output);

    /**
     * @param Input $input
     * @param Output $output
     *
     * @return void
     */
    public function unmarshal(Input $input, Output $output);
}
