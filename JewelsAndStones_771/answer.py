class JewelsAndStones(object):
    def response(self, j, s):
        num = 0
        for strA in j:
            for strB in s:
                if strA == strB:
                    num += 1
        return num


j = 'aA'
s = 'aAABccD'
method = JewelsAndStones()
rs = method.response(j, s)
print(rs)

