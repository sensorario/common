<?php

namespace Sensorario\Common\DateTime;

use PHPUnit\Framework\TestCase;

/**
 * @covers Sensorario\Common\DateTime\Today
 */
final class TodayTest extends TestCase
{
    public function testReturnToday()
    {
        $today = new Today();
        $this->assertEquals(
            $today->format('d/m/Y'),
            (new \DateTime('now'))->format('d/m/Y')
        );
    }

    public function testDoesNotConsiderHoursMinutesAndSeconds()
    {
        $today = new Today();
        $this->assertEquals(
            '00:00:00',
            $today->format('H:i:s')
        );
    }
}
