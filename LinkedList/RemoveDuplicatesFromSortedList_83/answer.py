class Solution:
    def deleteDuplicates(self, head):
        pointer = head
        while pointer != None:
            if pointer.next != None and pointer.val == pointer.next.val:
                pointer.next = pointer.next.next
                self.deleteDuplicates(pointer)
            pointer = pointer.next
        return head