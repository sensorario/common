<?php

namespace Sensorario\Common\Workflow;

class SuperConf
{
    private $conf = [];

    private $places = [];

    public function setConf(array $conf)
    {
        $this->conf = $conf;
        foreach ($this->conf as $value) {
            $this->addIfValueIsNotPresent($value[1]);
            $this->addIfValueIsNotPresent($value[2]);
        }
    }

    public function addIfValueIsNotPresent($value)
    {
        if (!in_array($value, $this->places)) {
            array_push($this->places, $value);
        }
    }

    public function getPlaces()
    {
        if ([] == $this->places) {
            throw new \LogicException(
                'Mmm! Ask empty places? Maybe you forgot to set configuration?'
            );
        }

        return $this->places;
    }

    public function getConf()
    {
        return $this->conf;
    }
}
