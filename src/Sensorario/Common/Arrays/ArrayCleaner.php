<?php

namespace Sensorario\Common\Arrays;

final class ArrayCleaner
{
    private $collection;

    private function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public static function keepOnlyUnique(Collection $collection) : ArrayCleaner
    {
        return new self($collection);
    }

    public function getItems() : Collection
    {
        $collection = new Collection([]);
        foreach ($this->collection->getItems() as $itemKey => $itemValue) {
            if ($this->countNumberOfInstanceOf($itemValue) == 1) {
                $collection->append($itemValue);
            }
        }
        return $collection;
    }

    public function countNumberOfInstanceOf(int $value) : int
    {
        $count = 0;
        foreach ($this->collection->getItems() as $itemKey => $itemValue) {
            if ($itemValue == $value) {
                $count++;
            }
        }
        return $count;
    }
}
