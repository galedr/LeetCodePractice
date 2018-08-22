<?php
class NextGreaterElement_1
{
    public function response($arr1, $arr2)
    {
        $rs = [];
        foreach ($arr1 as $k => $v) {
            $rs[] = $this->getLastGreater($v, $arr2);
        }
        return $rs;
    }

    private function getLastGreater($num, $arr, $rs_element = -1)
    {
        if (empty($arr)) {
            return -1;
        }
        $tmp = array_pop($arr);
        if ($num == $tmp) {
            return $rs_element;
        }
        if ($tmp > $num) {
            $rs_element = $tmp;
        }
        return $this->getLastGreater($num, $arr, $rs_element);
    }
}

class NextGreaterElement_1_front
{
    public function response($arr1, $arr2)
    {
        $rs = [];
        foreach ($arr1 as $k => $v) {
            $rs[] = $this->getLastGreater($v, $this->findElementOnArr2($v, $arr2));
        }
        return $rs;
    }

    private function findElementOnArr2($num, $arr)
    {
        if (empty($arr)) {
            return $arr;
        }
        $tmp = array_shift($arr);
        if ($tmp == $num) {
            return $arr;
        }
        return $this->findElementOnArr2($num, $arr);
    }

    private function getLastGreater($num, $arr)
    {
        if (empty($arr)) {
            return -1;
        }
        $tmp = array_shift($arr);
        if ($tmp > $num) {
            return $tmp;
        }
        return $this->getLastGreater($num, $arr);
    }
}

$arr1 = [5,1,4];
$arr2 = [4,1,5,3,7];
$method = new NextGreaterElement_1();
$p_method = new NextGreaterElement_1_front();
print_r($p_method->response($arr1, $arr2));