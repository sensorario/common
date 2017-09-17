<?php

namespace Sensorario\Common\Arrays;

use PHPUnit\Framework\TestCase;

final class CollectionTest extends TestCase
{
    /** @expectedException \ArgumentCountError */
    public function testMustBeDefinedWithAnArray()
    {
        $collection = new Collection();
    }

    public function testIsDefinedWithAnArray()
    {
        $items = [42, 42, 44444];
        $collection = new Collection($items);
        $this->assertEquals(
            $items,
            $collection->getItems()
        );
    }

    public function testAppendItemsOneByOne()
    {
        $collection = new Collection([]);
        $collection->append(42);
        $this->assertEquals(
            [42],
            $collection->getItems()
        );
    }

    public function testKnowsIfAnItemIsNotPresent()
    {
        $collection = new Collection([]);
        $this->assertSame(false, $collection->hasItem(42));
    }

    public function testKnowsIfAnItemIsPresent()
    {
        $collection = new Collection([]);
        $collection->append(42);
        $this->assertSame(true, $collection->hasItem(42));
    }
}
