<?php
namespace Models;

use Models\Operators\Addition;
use Models\Operators\Subtraction;
use Models\Operators\Multiplication;
use Models\Operators\Division;

class Token
{
    public static function get ($value)
    {
        if (is_numeric($value))
        {
            return $value;
        }
        elseif ($value == '+')
        {
            return new Addition();
        }
        elseif ($value == '-')
        {
            return new Subtraction();
        }
        elseif ($value == '*')
        {
            return new Multiplication();
        }
        elseif ($value == '/')
        {
            return new Division();
        }

    }


}