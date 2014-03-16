<?php

namespace Ikslakurd\GameOfLife;

class GameOfLife
{
    /**
     * @var array
     */
    protected $grid = array();

    /**
     * @param array $grid
     */
    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Checks that coordinates are integer values.
     *
     * @param int $xCoordinate
     * @param int $yCoordinate
     *
     * @return bool
     */
    protected function checkCoordinates($xCoordinate, $yCoordinate)
    {
        if (!is_int($xCoordinate) || !is_int($yCoordinate)) {
            throw new \InvalidArgumentException("Coordinates must be integers");
        }

        return true;
    }

    /**
     * Counts the number of live neighbours of a given cell.
     *
     * @param $xCoordinate
     * @param $yCoordinate
     *
     * @return int Number of live neighbours
     *
     * @throws \InvalidArgumentException
     */
    public function countLiveNeighbours($xCoordinate, $yCoordinate)
    {
        $this->checkCoordinates($xCoordinate, $yCoordinate);

        $count = 0;

        for ($i = ($xCoordinate - 1); $i <= ($xCoordinate + 1); $i++) {
            if (!array_key_exists($i, $this->grid)) {
                continue;
            }

            for ($j = ($yCoordinate - 1); $j <= ($yCoordinate + 1); $j++) {
                if (!array_key_exists($j, $this->grid[$i])) {
                    continue;
                }

                // current cell
                if ($xCoordinate == $i && $yCoordinate == $j) {
                    continue;
                }

                $count += (int) $this->grid[$i][$j];
            }
        }

        return $count;
    }

    /**
     * Determines if a cell lives (or dies).
     *
     * @param $xCoordinate
     * @param $yCoordinate
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    public function cellLives($xCoordinate, $yCoordinate)
    {
        $this->checkCoordinates($xCoordinate, $yCoordinate);

        $count = $this->countLiveNeighbours($xCoordinate, $yCoordinate);

        // current state = alive
        if ($this->grid[$xCoordinate][$yCoordinate]) {
            return ($count >= 2 && $count <= 3);
        }

        return $count == 3;
    }
}