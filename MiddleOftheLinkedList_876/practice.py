import math


class Node(object):
    def __init__(self, x=None):
        self.data = x
        self.next = None


class MiddleOfTheLinkedList(object):
    def response(self, arr):
        head = self.createLinkedList(arr)
        num = self.countLengthOfList(head)
        key = self.getMiddleKey(num)
        return self.getElementByKey(head, key)

    def createLinkedList(self, arr):
        head = Node()
        pointer = head
        for i in arr:
            next = Node()
            while pointer.next != None:
                pointer = pointer.next
            next.data = i
            pointer.next = next
        return head

    def countLengthOfList(self, head):
        if head.next is None:
            return 0
        count = 0
        pointer = head
        while pointer.next != None:
            count += 1
            pointer = pointer.next
        return count

    def getMiddleKey(self, num):
        return math.ceil(num / 2) if (num % 2) != 0 else (num / 2) + 1

    def getElementByKey(self, head, key):
        if head.next is None:
            return 0
        count = 1
        p = head.next
        while p is not None and key > count:
            p = p.next
            count += 1

        return p.data


arr = [2, 3, 4, 5, 6, 7]
method = MiddleOfTheLinkedList()
print(method.response(arr))
