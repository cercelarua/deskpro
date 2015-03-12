<?php

namespace Models\Operators;

abstract class OperatorAbstract
{
    public function getPrecedence()
    {
        return $this->precedence;
    }

    abstract public function doOperation($x, $y);

}