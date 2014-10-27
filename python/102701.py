def censor(text, word):
    list = text.split()
    temp = ""
    for x in list:
        if x == word:
            x = "*" * len(word)
    temp = " ".join(list)
    return temp

print(censor("hey hey hey","hey"))