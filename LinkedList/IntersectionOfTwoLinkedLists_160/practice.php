<?php

class Node160
{
    public $val;
    public $next = null;
}

class IntersectionOfTwoLinkedLists
{
    public function createList($arr)
    {
        $head = new Node160();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node160();
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

    public function makeIntersection($head, $tail)
    {
        $p = $head;
        $q = $p->next;
        while ($q) {
            if (!$q->next) {
                $q->next = $tail;
                $p->next = $q;
                break;
            }
            $q = $q->next;
            $p = $p->next;
        }
        return $head;
    }

    public function getIntersection($head1, $head2)
    {
        $l1 = $this->getCount($head1);
        $l2 = $this->getCount($head2);
        $p1 = $head1;
        $p2 = $head2;
        if ($l1 > $l2) {
            $p1 = $this->cutDiff($p1, ($l1 - $l2));
        } elseif ($l1 < $l2) {
            $p2 = $this->cutDiff($p2, ($l2 - $l1));
        }
        while ($p1 and $p2) {
            if ($p1 == $p2) {
                return $p1;
            }
            $p1 = $p1->next;
            $p2 = $p2->next;
        }
        return null;
    }

    public function cutDiff($head, $num)
    {
        $count = 0;
        while ($head) {
            if ($count == $num) {
                break;
            }
            $head = $head->next;
            $count++;
        }
        return $head;
    }

    public function getCount($head)
    {
        if (!$head) {
            return 0;
        }
        $count = 0;
        $p = $head;
        while ($p) {
            $p = $p->next;
            $count++;
        }
        return $count;
    }
}

$arr1 = [1,8,7,2,3];
$arr2 = [5,6,7];
$tail_arr = [4,5,6];
$method = new IntersectionOfTwoLinkedLists();
$list_1 = $method->createList($arr1);
$list_2 = $method->createList($arr2);
$tail = $method->createList($tail_arr);
$list_1 = $method->makeIntersection($list_1, $tail);
$list_2 = $method->makeIntersection($list_2, $tail);
$rs = $method->getIntersection($list_1, $list_2);
var_dump($rs);

