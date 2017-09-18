<?php

namespace Sensorario\Common\Xml;

final class XmlReader extends \SimpleXMLElement
{
    public function asJson()
    {
        return json_encode($this);
    }
}
