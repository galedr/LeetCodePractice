# 由於LeetCode 上的ListNode 呼叫，再__init__ 限制輸入參數 x，使其必定有無值head，故回傳由head.next 開始
class Solution:
    def mergeTwoLists(self, l1, l2):
        if l1 is None:
            return l2
        if l2 is None:
            return l1
        head = ListNode(0)
        p = head
        while l1 != None and l2 != None:
            if l1.val > l2.val:
                p.next = l2
                l2 = l2.next
            else:
                p.next = l1
                l1 = l1.next
            p = p.next
        if l1 is not None:
            p.next = l1
        if l2 is not None:
            p.next = l2
        return head.next