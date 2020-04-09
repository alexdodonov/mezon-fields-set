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
            'id' => [
                'type' => 'int'
            ],
            'untyped' => []
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
        $this->assertCount(2, $fieldsSet->getFields());
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

    /**
     * Testing getFieldsNames method
     */
    public function testGetFieldsNames(): void
    {
        // setup
        $fieldsSet = new \Mezon\FieldsSet($this->dataSet());

        // test body and assertions
        $this->assertEquals('iduntyped', implode('', $fieldsSet->getFieldsNames()));
    }

    /**
     * Testing getFieldType method
     */
    public function testGetFieldType(): void
    {
        // setup
        $fieldsSet = new \Mezon\FieldsSet($this->dataSet());

        // test body and assertions
        $this->assertEquals('int', $fieldsSet->getFieldType('id'));
    }

    /**
     * Testing getFieldType method with exception
     */
    public function testGetFieldTypeException(): void
    {
        // setup
        $fieldsSet = new \Mezon\FieldsSet($this->dataSet());
        $this->expectException(\Exception::class);

        // test body and assertions
        $fieldsSet->getFieldType('exception-field');
    }

    /**
     * Testing getFieldType method with exception for untyped field
     */
    public function testGetFieldTypeExceptionUntyped(): void
    {
        // setup
        $fieldsSet = new \Mezon\FieldsSet($this->dataSet());
        $this->expectException(\Exception::class);

        // test body and assertions
        $fieldsSet->getFieldType('untyped');
    }
}
