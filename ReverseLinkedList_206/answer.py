class Solution:
    def reverseList(self, head):
        reverse = None
        pointer = head
        while pointer:
            temp = pointer
            pointer = pointer.next
            temp.next = reverse
            reverse = temp
        return reverse