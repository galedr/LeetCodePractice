class MyQueue:

    def __init__(self):
        self._stack = []

    def push(self, x):
        self._stack.append(x)

    def pop(self):
        if not self._stack:
            return None
        rs = self._stack[0]
        del self._stack[0]
        if len(self._stack) > 0:
            p = []
            for i in self._stack:
                p.append(i)
            self._stack = p
        return rs

    def peek(self):
        if not self._stack:
            return None
        return self._stack[0]

    def empty(self):
        return False if len(self._stack) > 0 else True
