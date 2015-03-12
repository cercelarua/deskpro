<?php
require_once('autoload.php');


use Models\Calculator;


$calculator = Calculator::getInstance();

$result = $calculator->evaluate('7-5');
assert ($result == 2);

$result = $calculator->evaluate('8/4/2*3+6/4-3*2');
assert ($result == -1.5);

$result = $calculator->evaluate('2-3/6+4/2');
assert ($result == 3.5);

$result = $calculator->evaluate('6+1/2');
assert ($result == 6.5);


echo "Tests OK";