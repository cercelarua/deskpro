<?php

namespace Models\Operators;

use Models\Operators\OperatorAbstract;

class Multiplication extends OperatorAbstract
{
    public $precedence = 2;

    public function doOperation($x, $y)
    {
        return $x * $y;
    }
}