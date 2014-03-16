<?php

namespace Ikslakurd\GameOfLife;

class GameOfLifeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::__construct
     *
     * @expectedException PHPUnit_Framework_Error
     */
    public function testErrorIsRaisedForInvalidConstructorArgument()
    {
        new GameOfLife();
    }

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::__construct
     */
    public function testObjetCanBeConstructed()
    {
        $grid = array();
        $gameOfLife = new GameOfLife($grid);

        $this->assertInstanceOf('Ikslakurd\\GameOfLife\\GameOfLife', $gameOfLife);
    }
}