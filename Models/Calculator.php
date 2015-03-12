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
        $stack = $this->_parseString($string);
        return $this->_compute($stack);
    }

    private function _compute($stack)
    {
        $result = array();
        foreach ($stack as $token)
        {

            if (!$token instanceof OperatorAbstract)
            {
                array_push ($result, $token);
            }
            else
            {

                $operationResult = $token->doOperation(array_pop($result), array_pop($result));
                array_push ($result, $operationResult);
            }
        }

        return $result[0];
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
            $token = Token::get($tokenStr);

            if (!$token instanceof OperatorAbstract)
            {
                array_push($stack, $token);
            }
            else
            {
                if (!count($operators))
                {
                    array_push($operators, $token);
                }
                else
                {
                    $topOperatorInStack = end($operators);

                    if ($topOperatorInStack->getPrecedence() >= $token->getPrecedence())
                    {
                        do {
                            array_push ($stack, array_pop($operators));
                        }
                        while (
                            count($operators)
                            &&
                            $topOperatorInStack->getPrecedence() >= $token->getPrecedence()
                        );
                        array_push($operators, $token);
                    }
                    else
                    {
                        array_push($operators, $token);
                    }


                }
            }

        }

        $stack = array_merge($stack, array_reverse($operators));

        return $stack;
    }




}