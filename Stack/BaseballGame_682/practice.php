<?php

class BaseballGame_682
{
    public function response(array $arr)
    {
        $point = []; // 有效得分紀錄
        $sum = 0; // 總和
        foreach ($arr as $k => $v) {
            switch ($v) {
                case '+';
                    $tmp = $point;
                    if (!empty($tmp)) {
                        $num1 = array_pop($tmp);
                        $num2 = (empty($tmp)) ? 0 : array_pop($tmp);
                        $s = $num1 + $num2;
                        $sum += $s;
                        array_push($point, $s);
                    }
                    break;
                case 'C':
                    if (!empty($point)) {
                        $tmp = array_pop($point);
                        $sum = $sum - $tmp;
                    }
                    break;
                case 'D':
                    if (!empty($point)) {
                        $tmp = $point;
                        $s = array_pop($tmp);
                        $s = $s * 2;
                        $sum += $s;
                        array_push($point, $s);
                    }
                    break;
                default:
                    $sum += $v;
                    array_push($point, $v);
                    break;
            }
        }
        return $sum;
    }
}

$arr = ["5","-2","4","C","D","9","+","+"];
$method = new BaseballGame_682();
print_r($method->response($arr));