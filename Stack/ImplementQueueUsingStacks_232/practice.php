<?php

class ImplementQueueUsingStacks_232
{
    public $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    public function pop()
    {
        if (empty($this->stack)) {
            return null;
        }
        $rs = $this->stack[0];
        unset($this->stack[0]);
        if (!empty($this->stack)) {
            $p = [];
            foreach ($this->stack as $k => $v) {
                $p[] = $v;
            }
            $this->stack = $p;
        }
        return $rs;
    }

    public function push($n)
    {
        array_push($this->stack, $n);
    }

    public function peek()
    {
        if (!empty($this->stack)) {
            return $this->stack[0];
        }
        return null;
    }

    public function isEmpty()
    {
        return (empty($this->stack)) ? true : false;
    }
}

$method = new ImplementQueueUsingStacks_232();
$method->push(2);
$method->push(5);
$method->push(4);
echo $method->pop() . '<br>';
echo $method->peek();
var_dump($method->isEmpty());