<?php

class MinStack_255
{
    public $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function push($n)
    {
        array_push($this->stack, $n);
    }

    public function pop()
    {
        if (empty($this->stack)) {
            return false;
        }
        array_pop($this->stack);
    }

    public function top()
    {
        if (empty($this->stack)) {
            return null;
        }
        return array_pop($this->stack);
    }

    public function getMin()
    {
        if (empty($this->stack)) {
            return null;
        }
        $tmp = [];
        foreach ($this->stack as $k => $v) {
            if (!empty($tmp)) {
                $p = array_pop($tmp);
                $q = ($p < $v) ? $p : $v;
                array_push($tmp, $q);
                continue;
            }
            array_push($tmp, $v);
        }
        return $tmp[0];
    }
}

$method = new MinStack_255();
$method->push(-2);
$method->push(0);
$method->push(-3);
echo $method->getMin() . '<br>';
$method->pop();
echo $method->top() . '<br>';
echo $method->getMin() . '<br>';