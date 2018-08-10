<?php

class Node141
{
    public $val;
    public $next = null;
}

class LinkedListCycle
{
    public function createList($arr)
    {
        $head = new Node141();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node141();
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

    public function createCycleList($arr)
    {
        $head = new Node141();
        $pointer = $head;
        $last = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node141();
            while ($pointer->next) {
                $pointer = $pointer->next;
            }
            $pointer->val = $arr[$i];
            if (!empty($arr[$i + 1])) {
                $next->val = $arr[$i + 1];
                $pointer->next = $next;
            } else {
                $pointer->next = $last;
            }
        }
        return $head;
    }

    /**
     * @param $list
     * @return mixed
     * @notice
     */
    public function isCycle($list)
    {
        $p = $list;
        $q = $list->next;
        while ($p->val != $q->val) {
            if (!$q or !$p) {
                return false;
            }
            $p = $p->next;
            $q = $q->next->next;
        }
        return true;
    }

    public function printAll($list)
    {
        while ($list) {
            print_r($list->val);
            $list = $list->next;
        }
    }
}
$arr = [1,2,3,4];
$cyArr = [2,3,4,5];
//$arr = [1,2,3,4,5,4,3,2,1];
$method = new LinkedListCycle();
$list = $method->createList($arr);
$cycle = $method->createCycleList($cyArr);
$rs = $method->isCycle($cycle);
var_dump($rs);