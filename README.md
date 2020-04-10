# Base application class [![Build Status](https://travis-ci.com/alexdodonov/mezon-fields-set.svg?branch=master)](https://travis-ci.com/alexdodonov/mezon-fields-set) [![codecov](https://codecov.io/gh/alexdodonov/mezon-fields-set/branch/master/graph/badge.svg)](https://codecov.io/gh/alexdodonov/mezon-fields-set)

## Intro

You may need to store a list of typed fields for some purposes. So this class doing exactly what  you need.

## Installation

Just print

```
composer require mezon/fields-set
```

## Creation

The creation is quite simple

```PHP
$fieldsSet = new \Mezon\FieldsSet([
    'id' => [
        'type' => 'int',
        'title' => 'id of the record'
    ],
    'title' => [
        'type' => 'string',
        'title' => 'some title'
    ],
    'description' => [
        'type' => 'string',
        'title' => 'quite obvious yeah?)'
    ]
]);
```

## Reference

Method returns all fields in the set
```PHP
public function getFields(): array
```

Method validates if the field exists in our set
```PHP
public function hasField(string $fieldName): bool
```