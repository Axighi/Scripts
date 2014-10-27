#!/usr/bin/python
#coding:utf-8

def fun(x,y):
    if x == y:
        print x,'等于',y
    else:
        print x,'!=',y

s1 = raw_input("input something:")
s2 = raw_input("input something:")

fun(s1,s2)
