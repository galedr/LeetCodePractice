<?php

class Node203
{
    public $val;
    public $next = null;
}

class RemoveLinkedListElement
{
    public function createList($arr)
    {
        $head = new Node203();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node203();
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
     * @param $head
     * @param $val
     * @return null
     * @notice : 使用 dummy node 方法
     */
    public function deleteElement($head, $val)
    {
        if (!$head) {
            return null;
        }
        $n = new Node203();
        $n->next = $head;
        $p = $n;
        while ($head) {
            if ($head->val == $val) {
                $p->next = $head->next;
            } else {
                $p = $head;
            }
            $head = $head->next;
        }
        return $n->next;
    }

    public function printAll($head)
    {
        while ($head) {
            print_r($head->val);
            $head = $head->next;
        }
    }
}

//$arr = [6,1,2,6,3,4,5,6];
$arr = [2,1,1,2,3,1];
$method = new RemoveLinkedListElement();
$list = $method->createList($arr);
$list = $method->deleteElement($list, 1);
$method->printAll($list);
