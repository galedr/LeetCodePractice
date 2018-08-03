# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None
import math


# 由於leetcode 給予的環境是已經預設會吐一個Linked List = head 進來，且head node 也有賦值，故做法上與練習有所出入
# 題目與練習時搞錯了，練習時取了中間key 值的val，實際是要從key 值開始保留後續的

class Solution:
    def middleNode(self, head):
        num = self.countLengthOfList(head)
        key = self.getMiddleKey(num)
        return self.getElementByKey(head, key)

    def countLengthOfList(self, head):
        if head.next is None:
            return head.val
        count = 1
        pointer = head
        while pointer.next != None:
            count += 1
            pointer = pointer.next
        return count

    def getMiddleKey(self, num):
        return math.ceil(num / 2) if (num % 2) != 0 else (num / 2) + 1

    def getElementByKey(self, head, key):
        count = 1
        p = head
        q = p
        while q.next is not None and key > count:
            q = q.next
            del p
            p = q
            count += 1
        return p
