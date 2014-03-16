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
     * Counts the number of live neighbours.
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
        if (!is_int($xCoordinate) || !is_int($yCoordinate)) {
            throw new \InvalidArgumentException("Coordinates must be integers");
        }

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
}