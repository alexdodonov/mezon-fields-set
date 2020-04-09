<?php
require_once (__DIR__ . '/../FieldsSet.php');

class CommonApplicationUnitTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Testing constructor
     */
    public function testConstructor(): void
    {
        // setup and test body
        $fieldsSet = new \Mezon\FieldsSet();

        // assertions
        $this->addToAssertionCount(1);
    }
}
