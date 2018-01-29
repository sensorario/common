<?php

namespace Sensorario\Common\DateTime;

use PHPUnit\Framework\TestCase;

final class TimezonedTest extends TestCase
{
    public function testEuropeVersusDetroit()
    {
        $date = new \DateTime('2018-01-28 11:54:20.000000', new \DateTimeZone("Europe/Rome"));
        $this->assertEquals('2018-01-28T11:54:20.000+01:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(3600, $date->getOffset());

        $date->setTimezone(new \DateTimeZone("Europe/Rome"));
        $this->assertEquals('2018-01-28T11:54:20.000+01:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(3600, $date->getOffset());

        $date->setTimezone(new \DateTimeZone("America/Detroit"));
        $this->assertEquals('2018-01-28T05:54:20.000-05:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(-18000, $date->getOffset());
    }

    public function testUTCVersusLisbon()
    {
        $date = new \DateTime('2018-01-28 11:54:20.000000', new \DateTimeZone("UTC"));
        $this->assertEquals('2018-01-28T11:54:20.000+00:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(0, $date->getOffset());

        $date->setTimezone(new \DateTimeZone("Europe/Lisbon"));
        $this->assertEquals('2018-01-28T11:54:20.000+00:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(0, $date->getOffset());
    }

    public function testUTCVersusRome()
    {
        $date = new \DateTime('2018-01-28 11:54:20.000000', new \DateTimeZone("UTC"));
        $this->assertEquals('2018-01-28T11:54:20.000+00:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(0, $date->getOffset());

        $date->setTimezone(new \DateTimeZone("Europe/Rome"));
        $this->assertEquals('2018-01-28T12:54:20.000+01:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(3600, $date->getOffset());
    }

    public function testRomeVersusLisbon()
    {
        $date = new \DateTime('2018-01-28 11:54:20.000000', new \DateTimeZone("Europe/Rome"));
        $this->assertEquals('2018-01-28T11:54:20.000+01:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(3600, $date->getOffset());

        $date->setTimezone(new \DateTimeZone("Europe/Lisbon"));
        $this->assertEquals('2018-01-28T10:54:20.000+00:00', $date->format(\DateTime::RFC3339_EXTENDED));
        $this->assertEquals(0, $date->getOffset());
    }
}
