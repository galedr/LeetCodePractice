<?php

class ValidParentheses
{
    public $compare = ['(' => ')', '[' => ']', '{' => '}'];
    public $stack = [];

    public function response($str)
    {
        for ($i = 0; $i < strlen($str); $i++) {
            if (array_key_exists($str[$i], $this->compare)) {
                array_push($this->stack, $str[$i]);
            }
            if (in_array($str[$i], $this->compare)) {
                if (empty($this->stack)) {
                    return false;
                }
                $ln = array_pop($this->stack);
                if ($this->compare[$ln] != $str[$i]) {
                    return false;
                }
            }
        }
        return (empty($this->stack)) ? true : false;
    }
}

$str = '{[]}';
$method = new ValidParentheses();
var_dump($method->response($str));

