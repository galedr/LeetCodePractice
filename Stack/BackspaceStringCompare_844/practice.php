<?php
// 遇到# 就模擬鍵盤backspace，刪除前一個字
class BackspaceStringCompare_844
{
    public function response($str1, $str2)
    {
        $rs1 = $this->backspaceCompare($str1);
        $rs2 = $this->backspaceCompare($str2);
        return (implode('', $rs1) == implode('', $rs2)) ? true : false;
    }

    private function backspaceCompare($str)
    {
        $rs = [];
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] == '#') {
                array_pop($rs);
                continue;
            }
            array_push($rs, $str[$i]);
        }
        return $rs;
    }
}

$str1 = 'a##c';
$str2 = '#a#b';
$method = new BackspaceStringCompare_844();
var_dump($method->response($str1, $str2));