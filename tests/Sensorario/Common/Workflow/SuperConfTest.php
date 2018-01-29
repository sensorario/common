<?php

namespace Sensorario\Common\Workflow;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Workflow\DefinitionBuilder;
use Symfony\Component\Workflow\Transition;

/** @covers Sensorario\Common\Workflow\SuperConf */
final class SuperConfTest extends TestCase
{
    /** @expectedException \LogicException */
    public function testThrowLogicExceptionIfUsedWithoutDefinition()
    {
        $myConfiguration = new SuperConf();

        $foo = $myConfiguration->getPlaces();
    }

    public function testProvideJustPlacesByConfiguration()
    {
        $myConfiguration = new SuperConf();

        $myConfiguration->setConf([
            ['accept', 'proposed', 'scheduled'],
            ['reject', 'proposed', 'rejected'],
        ]);

        $places = [
            'scheduled',
            'rejected',
            'proposed',
        ];

        $foo = $myConfiguration->getPlaces();

        sort($places);
        sort($foo);

        $this->assertEquals($places, $foo);
    }

    public function testProvideRawConfiguration()
    {
        $myConfiguration = new SuperConf();

        $myConfiguration->setConf($conf = [
            ['accept', 'proposed', 'scheduled'],
            ['reject', 'proposed', 'rejected'],
        ]);

        $this->assertEquals($conf, $myConfiguration->getConf());
    }
}
