def list_of_chars(chars):
    if chars is None:
        return None
    size = len(chars)
    for i in range(size//2):
        chars[i], chars[size - 1 - i ] = chars[size - 1 - i], chars[i]

def reverse_string_alt(string):
    if string is None:
        return None
    return string[::-1]


def reverse_string_alt2(string):
    if string is None:
        return None
    return ''.join(reversed(string))
