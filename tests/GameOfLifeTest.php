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

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::countLiveNeighbours
     *
     *  @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidCountLiveNeighboursMethodArguments()
    {
        $grid = array();
        $gameOfLife = new GameOfLife($grid);

        $gameOfLife->countLiveNeighbours("foo", "bar");
    }

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::countLiveNeighbours
     */
    public function testLiveNeightboursCanBeCounted()
    {
        $grid = array(
            array(true, true, false),
            array(false, true, false),
            array(false, false, false)
        );

        $gameOfLife = new GameOfLife($grid);

        $this->assertEquals(2, $gameOfLife->countLiveNeighbours(0, 0));
        $this->assertEquals(2, $gameOfLife->countLiveNeighbours(0, 1));
        $this->assertEquals(2, $gameOfLife->countLiveNeighbours(0, 2));
        $this->assertEquals(3, $gameOfLife->countLiveNeighbours(1, 0));
        $this->assertEquals(2, $gameOfLife->countLiveNeighbours(1, 1));
        $this->assertEquals(2, $gameOfLife->countLiveNeighbours(1, 2));
        $this->assertEquals(1, $gameOfLife->countLiveNeighbours(2, 0));
        $this->assertEquals(1, $gameOfLife->countLiveNeighbours(2, 1));
        $this->assertEquals(1, $gameOfLife->countLiveNeighbours(2, 2));
    }
}