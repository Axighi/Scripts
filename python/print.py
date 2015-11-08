import sys

values = []

for x in range(int(sys.argv[2]), int(sys.argv[3]) + 1):
    values.append(str(sys.argv[1]) + str(x))

output = ','.join(values)
sys.stdout.write(output)
