#!/usr/bin/python
#coding:utf-8

from __future__ import division

result = {
	"+":x+y,
	"-":x-y,
	"*":x*y,
	"/":x/y
}

if __name__ == "__main__":
	x = int(raw_input("number 1:"))
	y = int(raw_input("number 2:"))
	operator = raw_input("symbol:")
	print result.get(operator)