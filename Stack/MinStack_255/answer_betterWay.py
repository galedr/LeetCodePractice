class MinStack:
    def __init__(self):
        self._stack = []
        self._min = []

    def push(self, x):
        if not isinstance(x, int):
            return False
        if not self._min:
            self._min.append(x)
        else:
            p = self._min[-1]
            if x <= p:
                self._min.append(x)
            else:
                self._min.append(p)
        self._stack.append(x)

    def pop(self):
        if not self._stack:
            return None
        self._min.pop()
        self._stack.pop()

    def top(self):
        if not self._stack:
            return None
        return self._stack[-1]

    def getMin(self):
        if not self._min:
            return None
        return self._min[-1]


# 送submit 出去後參考了處理速度更快的submit 的做法，使用另一個stack 來記錄並更新最小值，並在stack 會進出的時候同步更新
# 另外發現了python 對list 的其他操作方面寫法
method = MinStack()
method.push(-2)
method.push(0)
method.push(-3)
print(method.getMin())
method.pop()
print(method.top())
print(method.getMin())
