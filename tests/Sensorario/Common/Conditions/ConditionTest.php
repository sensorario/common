<?php

namespace Sensorario\Common\Conditions;

use PHPUnit\Framework\TestCase;

/**
 * @covers Sensorario\Common\Conditions\Condition
 */
final class ConditionTest extends TestCase
{
    public function testAcceptTrueConditinosAndCasesToBuildRightCaseCallableFunction()
    {
        $condition = new Condition();
        $condition->setDefaultCase(function () {
            return 'default';
        });
        $condition->addCase(42, function () {
            return 'fortyfour';
        });
        $condition->addCase(77, function () {
            return 'lkjkljlkjlk';
        });

        $condition->setTrueCondition(77);

        $result = $condition->buildResult();

        $this->assertEquals(
            'lkjkljlkjlk',
            $result
        );
    }

    /** @expectedException \RuntimeException */
    public function testThrowExceptionIfTrueConditinoIsNotScalar()
    {
        $condition = new Condition();
        $condition->addCase(new \DateTime(), function () {
            return 'fortyfour';
        });
    }
}
