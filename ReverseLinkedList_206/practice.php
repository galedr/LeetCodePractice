<?php
// example : input 1->2->3->4->5->null, output 5->4->3->2->1->null
// 因應題目，將初始List 改為頭Node 塞值
class Node206
{
    public $data;
    public $next = null;
}

class ReverseLinkedList
{
    public function response($head)
    {
        $list = $this->createList($head);
        $reverse = $this->getReverse($list);
        return $reverse;
    }

    public function createList($arr)
    {
        $head = new Node206();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node206();
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

    public function getReverse($head)
    {
        $reverse = null;
        $pointer = $head;
        while ($pointer) {
            // 宣告一個暫存變數，等於目前指標
            $temp = $pointer;
            // 指標往前進一格，操作$temp
            $pointer = $pointer->next;
            // $temp 目前為$head 的第二格，再$reverse 中必須為倒數第二，故$temp->next 為當前$reverse
            $temp->next = $reverse;
            // 將$reverse 等於$temp，下個迴圈才能把目前完成的List 正確放在$temp 的next
            $reverse = $temp;
        }
        return $reverse;
    }

    public function printAll($head)
    {
        $pointer = $head;
        while ($pointer) {
            print_r($pointer->data);
            $pointer = $pointer->next;
        }
    }
}

$list = [2,3,4,5,6];
$method = new ReverseLinkedList();
$method->printAll($method->response($list));