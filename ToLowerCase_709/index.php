<?php

$str = 'aBcDeFgH';

$method = new ToLowerCase();
echo $method->response($str);

class ToLowerCase
{
    public function response($str)
    {
        $rs = '';
        for ($i = 0; $i < strlen($str); $i++) {
            $rs .= (ctype_lower($str[$i])) ? strtoupper($str[$i]) : $str[$i];
        }
        return $rs;
    }
}