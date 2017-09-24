<?php

namespace Sensorario\Common\Conditions;

class Condition
{
    private $default;

    private $conditions = [];

    public function setTrueCondition($value)
    {
        $this->trueCondition = $value;
    }

    public function setDefaultCase(callable $default)
    {
        $this->default = $default;
    }

    public function addCase($trueCondition, callable $callable)
    {
        if (!is_scalar($trueCondition)) {
            throw new \RuntimeException(
                'Oops! True condition must be a scalar value'
            );
        }

        $this->conditions[$trueCondition] = $callable;
    }

    public function buildResult()
    {
        $method = isset($this->conditions[$this->trueCondition])
            ? $this->conditions[$this->trueCondition]
            : $this->default;

        return $method();
    }
}
