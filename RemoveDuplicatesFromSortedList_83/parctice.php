<?php

class Node83
{
    public $val;
    public $next = null;
}

class RemoveDuplicatesFromSortedList
{
    public function createList($arr)
    {
        $head = new Node83();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node83();
            while ($pointer->next) {
                $pointer = $pointer->next;
            }
            $pointer->val = $arr[$i];
            if (!empty($arr[$i + 1])) {
                $next->val = $arr[$i + 1];
                $pointer->next = $next;
            } else {
                $pointer->next = null;
            }
        }
        return $head;
    }

    /**
     * @param $list
     * @return mixed
     * @notice 經過21 之後，嘗試使用遞迴解法
     */
    public function removeDuplicates($list)
    {
        $pointer = $list;
        while ($pointer) {
            if ($pointer->next and $pointer->val == $pointer->next->val) {
                $pointer->next = $pointer->next->next;
                $this->removeDuplicates($pointer);
            }
            $pointer = $pointer->next;
        }
        return $list;
    }

    public function printAll($list)
    {
        while ($list) {
            print_r($list->val);
            $list = $list->next;
        }
    }
}

$arr = [1,1,1,1,2,3,4,4,5];
$method = new RemoveDuplicatesFromSortedList();
$list = $method->createList($arr);
$rs = $method->removeDuplicates($list);
$method->printAll($rs);