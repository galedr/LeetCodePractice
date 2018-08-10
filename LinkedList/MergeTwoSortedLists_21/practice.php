<?php
//example :
//Input: 1->2->4, 1->3->4
//Output: 1->1->2->3->4->4
class Node21
{
    public $data;
    public $next = null;
}

class MergeTwoSortedLists
{
    public function createList($arr)
    {
        $head = new Node21();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node21();
            while ($pointer->next) {
                $pointer = $pointer->next;
            }
            $pointer->data = $arr[$i];
            if (!empty($arr[$i + 1])) {
                $next->data = $arr[$i + 1];
                $pointer->next = $next;
            } else {
                $pointer->next = null;
            }
        }
        return $head;
    }

    public function mergeTwoLists($list_1, $list_2)
    {
        if (!$list_1 or !$list_2) {
            return false;
        }
        $head = new Node21();
        $p = $head; // 新Node 的指標
        while ($list_1 and $list_2) {
            // 若 1->data > 2->data，將2 整個next 塞給p，2 前進一個順位，反之亦然
            // 第二次迴圈進來，會以前一次較小的一方比較前一次較大的一方的第二順位，如此比較到有一方到底
            if ($list_1->data > $list_2->data) {
                $p->next = $list_2;
                $list_2 = $list_2->next;
            } else {
                $p->next = $list_1;
                $list_1 = $list_1->next;
            }
            $p = $p->next;
        }
        // 迴圈會在某一方結束之後停止，將1 or 2如果還有剩餘的塞進結果後面
        if ($list_1) {
            $p->next = $list_1;
        }

        if ($list_2) {
            $p->next = $list_2;
        }
        return $head;
    }

    public function printAll($list)
    {
        while ($list) {
            print_r($list->data);
            $list = $list->next;
        }
    }
}

$method = new MergeTwoSortedLists();
$list_1 = $method->createList([1,3,5]);
$list_2 = $method->createList([2,4,6]);
$rs = $method->mergeTwoLists($list_1, $list_2);
var_dump($rs);