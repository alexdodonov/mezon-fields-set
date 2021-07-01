<?php
namespace Mezon;

/**
 * Class FieldsSet
 *
 * @package Mezon
 * @subpackage FieldsSet
 * @author Dodonov A.A.
 * @version v.1.0 (2020/04/09)
 * @copyright Copyright (c) 2020, aeon.org
 */

/**
 * Set of typed fields
 */
class FieldsSet
{

    /**
     * List of fields
     *
     * @var array
     */
    private $fields = [];

    /**
     * Constructor
     *
     * @param array $fields
     *            List of all fields
     */
    public function __construct(array $fields = [])
    {
        $this->fields = $fields;
    }

    /**
     * Getting fields
     *
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * Method returns true if the field exists
     *
     * @param string $fieldName
     *            Field name
     * @return bool
     */
    public function hasField(string $fieldName): bool
    {
        return isset($this->fields[$fieldName]);
    }

    /**
     * Method returns array of fields names
     *
     * @return array
     */
    public function getFieldsNames(): array
    {
        return array_keys($this->fields);
    }

    /**
     * Method validates if the field exists
     *
     * @param string $fieldName
     *            Field name
     */
    public function validateFieldExistance(string $fieldName): void
    {
        if (isset($this->fields[$fieldName]) === false) {
            throw (new \Exception('Field \'' . $fieldName . '\' was not found'));
        }
    }

    /**
     * Method returns true if the field exists
     *
     * @param string $fieldName
     *            Field name
     * @return string field type
     */
    public function getFieldType(string $fieldName): string
    {
        $this->validateFieldExistance($fieldName);

        if (isset($this->fields[$fieldName]['type']) === false) {
            throw (new \Exception('Field \'' . $fieldName . '\' has no type'));
        }

        return $this->fields[$fieldName]['type'];
    }

    /**
     * Method returns true if the entity has custom fields
     * False otherwise
     *
     * @return bool true if the entity has custom fields
     */
    public function hasCustomFields(): bool
    {
        foreach ($this->fields as $fieldName => $field) {
            if (isset($field['type']) === false) {
                throw (new \Exception('Field \'' . $fieldName . '\' has no type'));
            }

            if ($field['type'] == 'custom') {
                return true;
            }
        }

        return false;
    }

    /**
     * Method removes field
     *
     * @param string $fieldName
     *            Field name
     */
    public function removeField($fieldName): void
    {
        if (isset($this->fields[$fieldName])) {
            unset($this->fields[$fieldName]);
        }
    }
}
