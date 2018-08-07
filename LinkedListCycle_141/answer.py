# 這題一開始搞錯，題目是偵測是否為環狀鏈結串列，想成是否為循環ex. 1,2,3,2,1
# 於LeetCode 上的submit 遇到不少測試雷，以至於判斷相較於 practice 版變更仔細了，在第12行
# 作法為以p 為指標，q 為先行，q 先走並一次走兩步，若串列為環狀，則總會有撞上同一個節點的時候
class Solution(object):
    def hasCycle(self, head):
        if head is None or head.next is None:
            return False
        p = head
        q = head.next
        while p != q:
            if p is None or q is None:
                return False
            if p.next is None or q.next is None:
                return False
            p = p.next
            q = q.next.next
        return True