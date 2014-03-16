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
}