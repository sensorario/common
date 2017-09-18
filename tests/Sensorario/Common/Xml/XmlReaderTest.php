<?php

namespace Sensorario\Common\Xml;

use PHPUnit\Framework\TestCase;

/**
 * @covers Sensorario\Common\Xml\XmlReader
 */
final class XmlReaderTest extends TestCase
{
    public function setUp()
    {
        $this->xmlContent = <<<XML
<root>
    <item>
        <foo>bar</foo>
    </item>
    <item>
        <foo>42</foo>
    </item>
</root>
XML;
        $this->xmlReader = new XmlReader($this->xmlContent);
    }

    public function testTransformXmlToObject()
    {
        $this->assertEquals(
            'bar',
            (string) $this->xmlReader->item->foo[0]
        );
    }

    public function testTransformXmlToArray()
    {
        $json = [
            'item' => [[
                'foo' => 'bar',
            ],[
                'foo' => '42'
            ]]
        ];

        $this->assertEquals(
            json_encode($json),
            $this->xmlReader->asJson()
        );
    }
}
