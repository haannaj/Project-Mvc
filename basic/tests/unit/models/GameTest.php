<?php

namespace tests\unit\models;

use app\models\Game21;


class GameTest extends \Codeception\Test\Unit
{

    public function testGetDices()
    {
        $test = new Game21();
        $res = $test->getDices(2);
        $exp = 4;
        $this->assertEquals($exp, strlen($res));

        $test = new Game21();
        $res = $test->getDices(1);
        $exp = 2;
        $this->assertEquals($exp, strlen($res));
    }

    public function testSumDices()
    {
        $test = new Game21();
        $res = $test->sumDices("5,2");
        $exp = "7";
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->sumDices("2");
        $exp = "2";
        $this->assertEquals($exp, $res);
    }

    public function testGetTotalSum()
    {
        $test = new Game21();
        $res = $test->totSum(8,18,"stop");
        $exp = 18;
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->totSum(8,18,"");
        $exp = 18+8;
        $this->assertEquals($exp, $res);
    }

    public function testGetGameoverMessage()
    {
        $test = new Game21();
        $res = $test->getGameOver21Message(20, "stop");
        $exp = "Game Over";
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->getGameOver21Message(21, "");
        $exp = "Congratulations, you got 21!";
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->getGameOver21Message(17, "");
        $exp = "";
        $this->assertEquals($exp, $res);
    }

    public function testWinnerOfGame()
    {
        $test = new Game21();
        $res = $test->pointsGame("Game Over", 24, 21);
        $exp = "You Won";
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->pointsGame("Stop", 21, 20);
        $exp = "Computer Won";
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->pointsGame("", 0, 18);
        $exp = "";
        $this->assertEquals($exp, $res);
    }

    public function testGetPoints()
    {
        $test = new Game21();
        $res = $test->pointsRound("You Won", 1, 2);
        $exp = [2,2];
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->pointsRound("Computer Won", 1, 2);
        $exp = [1,3];
        $this->assertEquals($exp, $res);

        $test = new Game21();
        $res = $test->pointsRound("", 1, 2);
        $exp = [1,2];
        $this->assertEquals($exp, $res);
    }
}


