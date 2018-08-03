<?php

$j = 'aA';
$s = 'aAAbbcD';

$method = new JewelsAndStones();
$rs = $method->response($j, $s);

echo $rs;

class JewelsAndStones
{
    public function response($j, $s)
    {
        $rs = 0;
        for ($a = 0; $a < strlen($j); $a++) {
            for ($b = 0; $b < strlen($s); $b++) {
                if (ctype_lower($j[$a]) == ctype_lower($s[$b]) and $j[$a] == $s[$b]) {
                    $rs += 1;
                }
            }
        }
        return $rs;
    }
}