# Marshaller

Generic marshalling component. Provides functionality to transform data from one form to another and vice versa.

There are many use cases where marshalling can be useful. Most of them though would be about taking snapshot of all properties of an object and sending it to some external system (database for persistence or browser as body of HTTP response).

Usually this "source" data can not be send "as is" and needs to be transformed. In very simple case: your object properties may be named in "camelCase" style and your database table field names are "underscore_separated". In practice there are many more reasons for such or similar transformations.

**Marshaller** provides simple framework for transforming data back and forth between "source" and "destination" formats.

## Features

* Supports transformations in both directions (marshalling/unmarshalling)
* Flexible definition of schema with rules for data transformation
* Support for different input and output formats. Built-in support for arrays and `stdClass` objects.

## Dependencies

* PHP >= 5.6.0

## Basic example

```php
<?php

// Pseudo-implementation of class encapsulating interactions with MySQL.
class UserMysqlDataGateway
{
    use Marshaller;

    /**
     * Assumption that code calling this method extracted User data from entity
     * instance and passed in this $userData argument.
     */
    public function put(\stdClass $userData)
    {
        // Default behaviour is to get all non-static properties and build
        // a map in such way that result of marshalling would contain all data
        // untouched (passed through) but keys would be underscore separated
        // instead of camelCase.
        $schema = SchemaBuilder::fromClassProperties(User::class)->build();
        $record = $this->marshal($userData, $schema);
        $this->mysql->insert($record);
    }

    public function findById($id)
    {
        $record = $this->mysql->fetch('users', $id);
        $schema = SchemaBuilder::fromClassProperties(User::class)->build();
        return $this->unmarshal($record, $schema);
    }
}
```
