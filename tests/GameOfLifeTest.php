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
     * @covers \Ikslakurd\GameOfLife\GameOfLife::get
     */
    public function testGridCanBeRetrieved()
    {
        $grid = array(
            array(true, true, false),
            array(false, true, false),
            array(false, false, false)
        );
        $gameOfLife = new GameOfLife($grid);

        $this->assertSame($grid, $gameOfLife->getGrid());
    }

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::set
     */
    public function testGridCanBeSet()
    {
        $grid = array(
            array(true, true, false),
            array(false, true, false),
            array(false, false, false)
        );
        $gameOfLife = new GameOfLife($grid);

        $newGrid = array(
            array(false, false, false),
            array(true, true, false),
            array(false, true, false)
        );
        $gameOfLife->setGrid($newGrid);

        $this->assertSame($newGrid, $gameOfLife->getGrid());
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

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::cellLives
     *
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidCellLivesArguments()
    {
        $grid = array();
        $gameOfLife = new GameOfLife($grid);

        $gameOfLife->cellLives("foo", "bar");
    }

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::cellLives
     */
    public function testCellLivesCanBeDetermined()
    {
        $grid = array(
            array(true, true, false),
            array(false, true, false),
            array(false, false, false)
        );
        $gameOfLife = new GameOfLife($grid);

        $this->assertEquals(true, $gameOfLife->cellLives(0, 0));
        $this->assertEquals(true, $gameOfLife->cellLives(0, 1));
        $this->assertEquals(false, $gameOfLife->cellLives(0, 2));
        $this->assertEquals(true, $gameOfLife->cellLives(1, 0));
        $this->assertEquals(true, $gameOfLife->cellLives(1, 1));
        $this->assertEquals(false, $gameOfLife->cellLives(1, 2));
        $this->assertEquals(false, $gameOfLife->cellLives(2, 0));
        $this->assertEquals(false, $gameOfLife->cellLives(2, 1));
        $this->assertEquals(false, $gameOfLife->cellLives(2, 2));
    }

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::next
     */
    public function testNextGenerationCanBeCreated()
    {
        $grid = array(
            array(false, false, false, false, false),
            array(false, false, false, false, false),
            array(false, true, true, true, false),
            array(false, false, false, false, false),
            array(false, false, false, false, false)
        );
        $gameOfLife = new GameOfLife($grid);

        $gameOfLife->next();

        $nextGrid = array(
            array(false, false, false, false, false),
            array(false, false, true, false, false),
            array(false, false, true, false, false),
            array(false, false, true, false, false),
            array(false, false, false, false, false)
        );

        $this->assertSame($nextGrid, $gameOfLife->getGrid());
    }

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::play
     *
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidPlayMethodArgument()
    {
        $grid = array(
            array(true, true, false),
            array(false, true, false),
            array(false, false, false)
        );
        $gameOfLife = new GameOfLife($grid);

        $gameOfLife->play(0);
    }

    /**
     * @covers \Ikslakurd\GameOfLife\GameOfLife::play
     */
    public function testCanBePlayed()
    {
        $grid = array(
            array(false, true, false, false, false, false),
            array(false, false, true, false, false, false),
            array(true, true, true, false, false, false),
            array(false, false, false, false, false, false),
            array(false, false, false, false, false, false),
            array(false, false, false, false, false, false)
        );
        $gameOfLife = new GameOfLife($grid);

        $lifecycles = 2;
        $gameOfLife->play($lifecycles);

        $expectedGrid = array(
            array(false, false, false, false, false, false),
            array(false, false, true, false, false, false),
            array(true, false, true, false, false, false),
            array(false, true, true, false, false, false),
            array(false, false, false, false, false, false),
            array(false, false, false, false, false, false)
        );

        $this->assertSame($expectedGrid, $gameOfLife->getGrid());
    }
}