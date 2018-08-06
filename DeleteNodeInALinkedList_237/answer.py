# practice 為只看題目敘述，於是創建一個LinkedList，比對輸入的值，刪除該Node
# answer 為解LeetCode 上的解題，題目直接給你欲刪除的node， 因此簡單地將值與next 往後排即可
class Solution:
    def deleteNode(self, node):
        node.val = node.next.val
        node.next = node.next.next