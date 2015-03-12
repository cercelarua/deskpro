<?php

namespace Models\Operators;

use Models\Operators\OperatorAbstract;

class Subtraction extends OperatorAbstract
{
    public $precedence = 1;

    public function doOperation($x, $y)
    {
        return $y - $x;
    }
}