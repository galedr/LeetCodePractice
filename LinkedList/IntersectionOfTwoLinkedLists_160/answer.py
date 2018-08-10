class Solution(object):
    def getIntersectionNode(self, headA, headB):
        if headA is None or headB is None:
            return None
        l1 = self.getCount(headA)
        l2 = self.getCount(headB)
        p1 = headA
        p2 = headB
        if l1 > l2:
            p1 = self.cutDiff(p1, (l1 - l2))
        elif l1 < l2:
            p2 = self.cutDiff(p2, (l2 - l1))
        while p1 and p2:
            if p1 == p2:
                return p1
            p1 = p1.next
            p2 = p2.next
        return None

    def cutDiff(self, head, num):
        count = 0
        while head:
            if count == num:
                break
            head = head.next
            count += 1
        return head

    def getCount(self, head):
        count = 0
        p = head
        while p:
            p = p.next
            count += 1
        return count