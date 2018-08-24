class Solution:
    def __init__(self):
        self._left = []
        self._compare = {'(': ')', '[': ']', '{': '}'}

    def isValid(self, s):
        """
        :type s: str
        :rtype: bool
        """
        for x in s:
            if x in self._compare:
                self._left.append(x)
            if x in self._compare.values():
                if not self._left:
                    return False
                ln = self._left.pop()
                if self._compare[ln] != x:
                    return False

        return False if len(self._left) > 0 else True


s = '{[)}'
method = Solution()
print(method.isValid(s))
