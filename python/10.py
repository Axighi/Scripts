#!/usr/bin/python

x = 'I am god'

def fun():
    global y
    y = 200

    global x
    x = 100

print x
fun()
print x
