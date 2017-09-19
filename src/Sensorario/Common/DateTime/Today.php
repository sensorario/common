<?php

namespace Sensorario\Common\DateTime;

class Today
{
    public function format(string $format)
    {
        return (new \DateTime(date('Y-m-d')))->format($format);
    }
}
