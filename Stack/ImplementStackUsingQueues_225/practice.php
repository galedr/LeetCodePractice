<?php

class ImplementStackUsingQueues_225
{
    public $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function pop()
    {
        return array_pop($this->stack);
    }

    public function push($n)
    {
        array_push($this->stack, $n);
    }

    public function top()
    {
        if (empty($this->stack)) {
            return null;
        }
        $rs = array_pop($this->stack);
        array_push($this->stack, $rs);
        return $rs;
    }

    public function isEmpty()
    {
        return (empty($this->stack)) ? true : false;
    }
}

$method = new ImplementStackUsingQueues_225();
$method->push(2);
$method->push(5);
$method->push(3);
echo $method->top() . '<br>';
echo $method->pop() . '<br>';
var_dump($method->stack);
