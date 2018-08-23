# 進出堆疊練習
class Solution:
    def calPoints(self, ops):
        s = 0
        point = []
        for i in ops:
            if i == '+':
                if len(point) > 0:
                    tmp = False
                    n1 = point.pop()
                    if len(point) > 0:
                        n2 = point.pop()
                        tmp = True
                    else:
                        n2 = 0
                    p = n1 + n2
                    s = s + p
                    if tmp:
                        point.append(n2)
                    point.append(n1)
                    point.append(p)
            elif i == 'C':
                if len(point) > 0:
                    n = point.pop()
                    s = s - n
            elif i == 'D':
                if len(point) > 0:
                    p = point.pop()
                    point.append(p)
                    p = p * 2
                    s = s + p
                    point.append(p)
            else:
                x = int(i)
                s = s + x
                point.append(x)
        return s


ops = ["5", "-2", "4", "C", "D", "9", "+", "+"]
method = Solution()
print(method.calPoints(ops))
