def compress_string(string)
    if string is None or length(string) == 0
        return string

    size = 0
    last_char = string[0]
    for char in string:
        if char != last_char:
            size += 2
            last_char = char
    size += 2

    if size >= len(string):
        return string

    compressed_string = list()
    count = 0
    last_char = string[0]
    for char in string:
        if char == last_char:
            count += 1
        else:
            compressed_string.append(last_char)
            compressed_string.append(str(count))
            count = 1
            last_char = char
    compressed_string.append(last_char)
    compressed_string.append(str(count))

    return "".join(compressed_string)
