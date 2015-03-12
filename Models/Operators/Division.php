<?php

namespace Models\Operators;

use Models\Operators\OperatorAbstract;

class Division extends OperatorAbstract
{
    public $precedence = 2;

    public function doOperation($x, $y)
    {
        return $y / $x;
    }
}