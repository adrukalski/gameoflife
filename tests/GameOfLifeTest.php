<?php

namespace Ikslakurd\GameOfLife;

class GameOfLifeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::__construct
     */
    public function testObjetCanBeConstructed()
    {
        $gameOfLife = new GameOfLife();

        $this->assertInstanceOf('Ikslakurd\\GameOfLife\\GameOfLife', $gameOfLife);
    }
}