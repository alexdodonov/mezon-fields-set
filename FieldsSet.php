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
     * @var boolean
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
}
