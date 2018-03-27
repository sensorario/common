<?php

namespace Sensorario\Common\Arrays;

use PHPUnit\Framework\TestCase;

/**
 * @covers Sensorario\Common\Arrays\ArrayCleaner
 */
final class CollectionTest extends TestCase
{
    /**
     * @expectedException \ArgumentCountError
     * @covers Sensorario\Common\Arrays\Collection::__construct
     */
    public function testMustBeDefinedWithAnArray()
    {
        $collection = new Collection();
    }

    /**
     * @covers Sensorario\Common\Arrays\Collection::__construct
     * @covers Sensorario\Common\Arrays\Collection::getItems
     */
    public function testIsDefinedWithAnArray()
    {
        $items = [42, 42, 44444];
        $collection = new Collection($items);
        $this->assertEquals(
            $items,
            $collection->getItems()
        );
    }

    /**
     * @covers Sensorario\Common\Arrays\Collection::__construct
     * @covers Sensorario\Common\Arrays\Collection::append
     * @covers Sensorario\Common\Arrays\Collection::getItems
     */
    public function testAppendItemsOneByOne()
    {
        $collection = new Collection([]);
        $collection->append(42);
        $this->assertEquals(
            [42],
            $collection->getItems()
        );
    }

    /**
     * @covers Sensorario\Common\Arrays\Collection::__construct
     * @covers Sensorario\Common\Arrays\Collection::hasItem
     */
    public function testKnowsIfAnItemIsNotPresent()
    {
        $collection = new Collection([]);
        $this->assertSame(false, $collection->hasItem(42));
    }

    /**
     * @covers Sensorario\Common\Arrays\Collection::__construct
     * @covers Sensorario\Common\Arrays\Collection::append
     * @covers Sensorario\Common\Arrays\Collection::hasItem
     */
    public function testKnowsIfAnItemIsPresent()
    {
        $collection = new Collection([]);
        $collection->append(42);
        $this->assertSame(true, $collection->hasItem(42));
    }

    public function testProvideSplice()
    {
        $items = [42, 42, 44444];
        $expectedItems = [44444];
        $collection = new Collection($items);
        $collection->initWith([
            Collection::PAGE_LENGTH => 1,
            Collection::PAGE_NUMBER => 3,
        ]);
        $this->assertEquals(
            $expectedItems,
            $collection->getItemsSplice()
        );
    }

    public function testProvidePageOfIterms()
    {
        $items = [42, 42, 44444];
        $expectedItems = [44444];
        $collection = new Collection($items);
        $this->assertEquals(
            $expectedItems,
            $collection->getItemsPage([
                Collection::PAGE_LENGTH => 1,
                Collection::PAGE_NUMBER => 3,
            ])
        );
    }
}
