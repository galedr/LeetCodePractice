<?php

class Node707
{
    public $val;
    public $next = null;
}

class LinkedListBuilder
{
    public function createList($arr)
    {
        $head = new Node707();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node707();
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
}

class DesignLinkedList
{
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function getElement($index)
    {
        if (!$this->list) {
            return false;
        }
        $count = 0;
        $p = $this->list;
        while ($p) {
            if ($count == $index) {
                return $p->val;
            }
            $p = $p->next;
            $count++;
        }
        return false;
    }

    public function addHead($val)
    {
        if (!$this->list) {
            return false;
        }
        $n = new Node707();
        $n->val = $val;
        $n->next = $this->list;
        $this->list = $n;
        return $this->list;
    }

    public function addTail($val)
    {
        if (!$this->list) {
            return false;
        }
        $n = new Node707();
        $n->val = $val;
        $p = $this->list;
        while ($p) {
            if (!$p->next) {
                $p->next = $n;
                break;
            }
            $p = $p->next;
        }
        return $this->list;
    }

    public function addAtIndex($index, $val)
    {
        if (!$this->list) {
            return false;
        }
        $p = $this->list;
        $n = new Node707();
        $n->val = $val;
        // 刪除第0個位置時特別處理
        if ($index == 0) {
            $n->next = $this->list;
            $this->list = $n;
            return $this->list;
        }
        // 藉由count 起始為1，使得當目標index 到時，p 的位置為index 前一位
        $count = 1;
        while ($p) {
            if ($count == $index) {
                $n->next = $p->next;
                $p->next = $n;
            }
            $p = $p->next;
            $count++;
        }
        return $this->list;
    }

    public function deleteAtIndex($index)
    {
        if (!$this->list) {
            return false;
        }
        $p = $this->list;
        if ($index == 0) {
            return (!$p->next) ? null : $p->next;
        }
        $count = 1;
        while ($p) {
            if ($count == $index) {
                $p->next = $p->next->next;
            }
            $p = $p->next;
            $count++;
        }
        return $this->list;
    }

    public function printAll($head)
    {
        $p = $head;
        while ($p) {
            print_r($p->val);
            $p = $p->next;
        }
    }

}

$arr = [2,3,4,5,6];
$create = new LinkedListBuilder();
$list = $create->createList($arr);
$method = new DesignLinkedList($list);
$get = $method->getElement(2);
$addHead = $method->addHead(1);
$addTail = $method->addTail(7);
$addAtIndex = $method->addAtIndex(0, 9);
$deleteAtIndex = $method->deleteAtIndex(3);
$method->printAll($deleteAtIndex);
// 1,2,3,4,5,6,7
