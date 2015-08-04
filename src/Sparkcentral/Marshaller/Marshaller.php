<?php
namespace Sparkcentral\Marshaller;

/**
 * Provides functionality of marshalling/unmarshalling of data based on provided MappingSchema.
 */
trait Marshaller
{
    /**
     * @param mixed $data
     * @param Schema $schema
     * @param string $outputType
     *
     * @return mixed
     */
    private function marshal($data, Schema $schema, $outputType = 'array')
    {
        $input = Input::create($data);
        $output = Output::create($outputType);
        /** @var Field $field */
        foreach ($schema as $field) {
            $field->marshal($input, $output);
        }

        return $output->raw();
    }

    /**
     * @param $data
     * @param Schema $schema
     * @param $outputType
     *
     * @return mixed
     */
    private function unmarshal($data, Schema $schema, $outputType = \stdClass::class)
    {
        $input = Input::create($data);
        $output = Output::create($outputType);
        /** @var Field $field */
        foreach ($schema as $field) {
            $field->unmarshal($input, $output);
        }

        return $output->raw();
    }
}
