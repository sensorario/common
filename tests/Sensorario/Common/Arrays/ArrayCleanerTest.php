<?php

namespace Sensorario\Common\Arrays;

use PHPUnit\Framework\TestCase;

/**
 * @covers Sensorario\Common\Arrays\ArrayCleaner
 */
final class ArrayCleanerTest extends TestCase
{
    /**
     * @covers Sensorario\Common\Arrays\Collection::__construct
     * @covers Sensorario\Common\Arrays\Collection::append
     * @covers Sensorario\Common\Arrays\Collection::getItems
     */
    public function testArrayWithUniqueKeysReturnSameArray()
    {
        $collection = new Collection([1,2,3]);
        $cleaner = ArrayCleaner::keepOnlyUnique($collection);
        $this->assertEquals(
            $collection,
            $cleaner->getItems()
        );
    }

    /**
     * @covers Sensorario\Common\Arrays\Collection::__construct
     * @covers Sensorario\Common\Arrays\Collection::append
     * @covers Sensorario\Common\Arrays\Collection::getItems
     */
    public function testCountNumnerOfItemsAValueAppears()
    {
        $collection = new Collection([1,2,3,3]);
        $cleaner = ArrayCleaner::keepOnlyUnique($collection);
        $this->assertEquals(
            2,
            $cleaner->countNumberOfInstanceOf(3)
        );
    }

    /**
     * @covers Sensorario\Common\Arrays\Collection::__construct
     * @covers Sensorario\Common\Arrays\Collection::append
     * @covers Sensorario\Common\Arrays\Collection::getItems
     */
    public function testRemoveValuesThatExistsTwice()
    {
        $collection = new Collection([1,2,3,3]);
        $cleaner = ArrayCleaner::keepOnlyUnique($collection);
        $this->assertEquals(
            new Collection([1,2]),
            $cleaner->getItems()
        );
    }
}
