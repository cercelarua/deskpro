<?php

namespace Models\Operators;

use Models\Operators\OperatorAbstract;

class Addition extends OperatorAbstract
{
    public $precedence = 1;

    public function doOperation($x, $y)
    {
        return $x + $y;
    }
}