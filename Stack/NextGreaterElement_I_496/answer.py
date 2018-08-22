# python 中，由於list 是可以被改變的，所以先將nums2 轉換成元祖，再進行迴圈，避免遞迴中nums2 受到改變
# 用巢狀迴圈 + 判斷直接解應該會比遞迴更快，但這邊主要是先練習stack 的操作與遞迴
class Solution:
    def nextGreaterElement(self, nums1, nums2):
        rs = []
        nums2 = tuple(nums2)
        for i in nums1:
            p = list(nums2)
            rs.append(self.getLastGreater(i, p))
        return rs

    def getLastGreater(self, num, arr, rs=-1):
        if not arr:
            return -1
        t = arr.pop()
        if num == t:
            return rs
        if t > num:
            rs = t
        return self.getLastGreater(num, arr, rs)


num1 = [4, 1, 2]
num2 = [1, 2, 3, 4]
method = Solution()
print(method.nextGreaterElement(num1, num2))
