<?php

namespace Sensorario\Common\Arrays;

final class Collection
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItems() : array
    {
        return $this->items;
    }

    public function append($item)
    {
        $this->items[] = $item;
    }

    public function hasItem($item)
    {
        return in_array($item, $this->items);
    }
}
