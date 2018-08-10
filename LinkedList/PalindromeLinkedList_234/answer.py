# LeetCode 的正式上限檢定很嚴格 ... 踩了比較多地雷，於是比practice 多了一些判斷
class Solution(object):
    def isPalindrome(self, head):
        if head is None or head.next is None:
            return True
        if head.next.next is None:
            return True if head.val == head.next.val else False
        p = head
        q = head
        while p != None and q.next != None:
            if p.next is None or q.next.next is None:
                break
            p = p.next
            q = q.next.next
        r = None
        c = p
        while c:
            tmp = c
            c = c.next
            tmp.next = r
            r = tmp
        while r:
            if head.val != r.val:
                return False
            if head.next is None or r.next is None:
                break
            head = head.next
            r = r.next
        return True