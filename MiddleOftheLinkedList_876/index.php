<?php

class Node
{
    public $data;
    public $next = null;
}

class MiddleOfTheLinkedList
{
    public function response($arr)
    {
        $head = $this->buildLinkedList($arr);
        $length = $this->countLength($head);
        $key = $this->getMiddleKey($length);
        return $this->getNodeValueByKey($head, $key);
    }

    private function buildLinkedList($arr)
    {
        $head = new Node();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node();
            while ($pointer->next) {
                $pointer = $pointer->next;
            }
            $next->data = $arr[$i];
            $pointer->next = $next;
        }
        return $head;
    }

    private function countLength($list)
    {
        if ($list->next == null) {
            return 0;
        }
        $count = 0;
        $pointer = $list;
        while ($pointer->next) {
            $count++;
            $pointer = $pointer->next;
        }
        return $count;
    }

    private function getNodeValueByKey($head, $key)
    {
        $count = 1;
        if ($head->next == null) {
            return 0;
        }
        $p = $head->next;
        while ($p and $key > $count) {
            $p = $p->next;
            $count++;
        }
        return $p->data;
    }

    private function getMiddleKey($num)
    {
        return ($num % 2 == 0) ? ($num / 2) + 1 : ceil($num / 2);
    }
}

$arr = [2,3,4,5,6,7,8,9];
$method = new MiddleOfTheLinkedList();
echo $method->response($arr);