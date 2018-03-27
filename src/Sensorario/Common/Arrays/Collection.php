<?php

namespace Sensorario\Common\Arrays;

final class Collection
{
    const PAGE_LENGTH = 'page_length';

    const PAGE_NUMBER = 'page_number';

    private $items;

    private $config;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItems() : array
    {
        return $this->items;
    }

    public function getItemsSplice() : array
    {
        return array_splice(
            $this->items,
            $this->config[self::PAGE_NUMBER] - 1,
            $this->config[self::PAGE_LENGTH]
        );
    }

    public function append($item)
    {
        $this->items[] = $item;
    }

    public function hasItem($item)
    {
        return in_array($item, $this->items);
    }

    public function initWith($config)
    {
        $this->config = $config;
    }

    public function getItemsPage(array $config)
    {
        $this->initWith($config);
        return $this->getItemsSplice();
    }
}
