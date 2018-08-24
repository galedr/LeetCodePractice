class MyStack:

    def __init__(self):
        self._stack = []

    def push(self, x):
        self._stack.append(x)

    def pop(self):
        return self._stack.pop()

    def top(self):
        rs = self._stack.pop()
        self._stack.append(rs)
        return rs

    def empty(self):
        return False if len(self._stack) > 0 else True