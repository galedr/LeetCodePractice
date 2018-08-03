class ToLowerCase(object):
    def response(self, str):
        rs = ''
        for s in str:
            rs += s if s.isupper() == False else s.lower()
        return rs


s = "HeLlo"
method = ToLowerCase()
r = method.response(s)
print(r)
