<?php
namespace Models;

use Models\Operators\OperatorAbstract;

class Calculator
{

    private function __construct()
    { }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance == null)
        {
            $instance = new static();
        }
        return $instance;
    }

    public function evaluate($string)
    {
        $this->_parseString($string);

    }



    private function _parseString($string)
    {
        preg_match_all('/\d+|[+-]|\*|\//', $string, $tokens);
        if (!count($tokens[0]))
        {
            throw new \Exception('Invalid expression : '.$this->expression);
        }

        $operators = $stack = array();
        foreach ($tokens[0] as $tokenStr)
        {

        }

    }




}