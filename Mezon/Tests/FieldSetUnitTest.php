<?php
namespace Mezon\Tests;

use \PHPUnit\Framework\TestCase;
use \Mezon\FieldsSet;

/** @psalm-suppress PropertyNotSetInConstructor */
class FieldSetUnitTest extends TestCase
{

    /**
     * Testing data
     *
     * @return array<string, array{type: string}|array<empty, empty>> testing data
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
     * Testing data
     *
     * @return array<string, array{type: string}> testing data
     */
    private function dataNoCustom(): array
    {
        return [
            'field' => [
                'type' => 'data'
            ]
        ];
    }

    /**
     * Testing data
     *
     * @return array<string, array{type: string}> testing data
     */
    private function dataCustom(): array
    {
        return [
            'field' => [
                'type' => 'custom'
            ]
        ];
    }

    /**
     * Testing constructor
     */
    public function testConstructor(): void
    {
        // setup and test body
        $fieldsSet = new FieldsSet($this->dataSet());

        // assertions
        $this->assertCount(2, $fieldsSet->getFields());
    }

    /**
     * Testing hasField method
     */
    public function testHasField(): void
    {
        // setup
        $fieldsSet = new FieldsSet($this->dataSet());

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
        $fieldsSet = new FieldsSet($this->dataSet());

        // test body and assertions
        $this->assertEquals('iduntyped', implode('', $fieldsSet->getFieldsNames()));
    }

    /**
     * Testing getFieldType method
     */
    public function testGetFieldType(): void
    {
        // setup
        $fieldsSet = new FieldsSet($this->dataSet());

        // test body and assertions
        $this->assertEquals('int', $fieldsSet->getFieldType('id'));
    }

    /**
     * Testing getFieldType method with exception
     */
    public function testGetFieldTypeException(): void
    {
        // setup
        $fieldsSet = new FieldsSet($this->dataSet());
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
        $fieldsSet = new FieldsSet($this->dataSet());
        $this->expectException(\Exception::class);

        // test body and assertions
        $fieldsSet->getFieldType('untyped');
    }

    /**
     * Testing validateFieldExistance method for unexisting field
     */
    public function testValidateFieldExistanceException(): void
    {
        // setup
        $fieldsSet = new FieldsSet($this->dataSet());
        $this->expectException(\Exception::class);

        // test body and assertions
        $fieldsSet->validateFieldExistance('unexisting');
    }

    /**
     * Testing validateFieldExistance method for existing field
     */
    public function testValidateFieldExistance(): void
    {
        // setup
        $fieldsSet = new FieldsSet($this->dataSet());

        // test body and assertions
        $fieldsSet->validateFieldExistance('id');
        $this->assertTrue(true);
    }

    /**
     * Testing method hasCustomFields
     */
    public function testHasCustomFieldsUntyped(): void
    {
        // setup and assertions
        $fieldsSet = new FieldsSet($this->dataSet());
        $this->expectException(\Exception::class);

        // test body
        $fieldsSet->hasCustomFields();
    }

    /**
     * Testing method hasCustomFields
     */
    public function testHasCustomFieldsFalse(): void
    {
        // setup
        $fieldsSet = new FieldsSet($this->dataNoCustom());

        // test body and assertions
        $this->assertFalse($fieldsSet->hasCustomFields());
    }

    /**
     * Testing method hasCustomFields
     */
    public function testHasCustomFieldsTrue(): void
    {
        // setup
        $fieldsSet = new FieldsSet($this->dataCustom());

        // test body and assertions
        $this->assertTrue($fieldsSet->hasCustomFields());
    }

    /**
     * Testing method removeField
     */
    public function testRemoveField(): void
    {
        // setup and assertions
        $fieldsSet = new FieldsSet($this->dataSet());
        $this->assertTrue($fieldsSet->hasField('id'));

        // test body
        $fieldsSet->removeField('id');

        // assertions
        $this->assertFalse($fieldsSet->hasField('id'));
    }
}
