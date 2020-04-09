<?php
require_once (__DIR__ . '/../FieldsSet.php');

class CommonApplicationUnitTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Testing data
     *
     * @return array testing data
     */
    private function dataSet(): array
    {
        return [
            'id' => []
        ];
    }

    /**
     * Testing constructor
     */
    public function testConstructor(): void
    {
        // setup and test body
        $fieldsSet = new \Mezon\FieldsSet($this->dataSet());

        // assertions
        $this->assertCount(1, $fieldsSet->getFields());
    }

    /**
     * Testing hasField method
     */
    public function testHasField(): void
    {
        // setup
        $fieldsSet = new \Mezon\FieldsSet($this->dataSet());

        // test body and assertions
        $this->assertTrue($fieldsSet->hasField('id'));
        $this->assertFalse($fieldsSet->hasField('unexisting-field'));
    }
}
