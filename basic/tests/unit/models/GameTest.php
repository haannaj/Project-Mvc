<?php

namespace tests\unit\models;

use app\models\Game21;


class GameTest extends \Codeception\Test\Unit
{
    public function testGame21()
    {
        $test = new Game21();
        $res = $test->getDices(2);
        $exp = "Computer Won!";
        $this->assertEquals($exp, $res);
    }

}
