<?php
//example
//Input: 1->2
//Output: false
//Input: 1->2->2->1
//Output: true
//leetcode 錯誤: [], [1,1], [1,0,1] = true
class Node234
{
    public $val;
    public $next = null;
}

class PalindromeLinkedList
{
    public function createList($arr)
    {
        $head = new Node234();
        $pointer = $head;
        for ($i = 0; $i < count($arr); $i++) {
            $next = new Node234();
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

    public function isPalindrome($head)
    {
        $p = $head;
        $q = $head;
        // 用快慢法取出串列中心，慢的串列會得到中心點的next，即為串列後半
        while ($p and $q->next) {
            $p = $p->next;
            $q = $q->next->next;
        }
        // 將p 反轉，為r
        $r = null;
        $c = $p;
        while ($c) {
            $tmp = $c;
            $c = $c->next;
            $tmp->next = $r;
            $r = $tmp;
        }
        // r 存在的每個節點，若與head 相同，則為迴文
        while ($r) {
            if ($head->val != $r->val) {
                return false;
            }
            $head = $head->next;
            $r = $r->next;
        }
        return true;
    }
}

//$arr = [1,2,3,3,2,1];
$arr = [1,1];
$method = new PalindromeLinkedList();
$list = $method->createList($arr);
var_dump($method->isPalindrome($list));
