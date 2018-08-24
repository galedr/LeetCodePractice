class MinStack:

    def __init__(self):
        self._stack = []

    def push(self, x):
        if not isinstance(x, int):
            return False
        self._stack.append(x)

    def pop(self):
        if not self._stack:
            return None
        self._stack.pop()

    def top(self):
        if not self._stack:
            return None
        rs = self._stack.pop()
        self._stack.append(rs)
        return rs

    def getMin(self):
        if not self._stack:
            return None
        return min(self._stack)

# 用practice 直翻過來的寫法，會在大量push 後執行getMin 超過submit Time Limit，於是改用內建函數
# Your MinStack object will be instantiated and called as such:
method = MinStack()
method.push(-2)
method.push(0)
method.push(-3)
print(method.getMin())
method.pop()
print(method.top())
print(method.getMin())
