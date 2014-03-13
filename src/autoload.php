<?php

spl_autoload_register(
    function($class) {
        static $classes = null;

        if ($classes === null) {
            $classes = array(
                'Ikslakurd\\GameOfLife\\GameOfLife' => '/GameOfLife.php',
            );
        }

        if (isset($classes[$class])) {
            require __DIR__ . $classes[$class];
        }
    }
);