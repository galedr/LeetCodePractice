<?php

class Node237
{
    public $data;
    public $next = null;
}

class DeleteNodeInALinkedList
{
    public $list;

    public function response($val)
    {
        return $this->deleteNode($val);
    }

    public function createList($arr)
    {
        $head = new Node237();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node237();
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
        $this->list = $head;
    }

    public function deleteNode($val)
    {
        if (!$this->list->next) {
            return false;
        }
        $head = $this->list;
        if ($head->data == $val) {
            return $head->next;
        }
        $pointer = $head;
        $temp = $pointer->next;
        while ($temp) {
            if ($temp->data == $val) {
                $pointer->next = $temp->next;
            }
            $pointer = $pointer->next;
            $temp = $temp->next;
        }
        return $head;
    }
}

$arr = [2,3,4,5,6];
$method = new DeleteNodeInALinkedList();
$method->createList($arr);
$rs = $method->deleteNode(4);
var_dump($rs);