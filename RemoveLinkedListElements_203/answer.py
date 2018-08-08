class Solution(object):
    def removeElements(self, head, val):
        if head is None:
            return None
        n = ListNode(0)
        n.next = head
        p = n
        while head != None:
            if head.val == val:
                p.next = head.next
            else:
                p = head
            head = head.next
        return n.next