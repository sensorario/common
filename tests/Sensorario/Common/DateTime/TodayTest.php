<?php

namespace Sensorario\Common\DateTime;

use PHPUnit\Framework\TestCase;

/**
 * @covers Sensorario\Common\DateTime\Today
 */
final class TodayTest extends TestCase
{
    public function setUp()
    {
        $this->today = new Today();
    }

    public function testReturnToday()
    {
        $this->assertEquals(
            $this->today->format('d/m/Y'),
            (new \DateTime('now'))->format('d/m/Y')
        );
    }

    public function testDoesNotConsiderHoursMinutesAndSeconds()
    {
        $this->assertEquals(
            '00:00:00',
            $this->today->format('H:i:s')
        );
    }
}
