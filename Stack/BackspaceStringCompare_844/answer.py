class Solution:
    def backspaceCompare(self, S, T):
        rs1 = self.letterCompare(S)
        rs2 = self.letterCompare(T)
        return True if rs1 == rs2 else False

    def letterCompare(self, s):
        rs = []
        for i in s:
            if i == '#':
                if len(rs) > 0:
                    rs.pop()
                continue
            rs.append(i)
        return rs


str1 = 'a##b'
str2 = '#a#c'
method = Solution()
print(method.backspaceCompare(str1, str2))
