<?php

namespace tests\unit\models;

use app\models\Dice;


class DiceTest extends \Codeception\Test\Unit
{
    /**
     * Try to create the controller class.
     */
    public function testRollDices()
    {
        $test = new Dice();
        $test->roll();
        $res = $test->getLastRoll();

        $this->assertEquals(1, strlen($res));
    }

    // public function testGraphicDiceClass()
    // {
    //     $test = new GraphicalDice();
    //     $test->roll();
    //     $res = $test->graphic();

    //     $exp = 6;
    //     $this->assertEquals($exp, strlen($res));
    // }
}
