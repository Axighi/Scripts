#!/usr/bin/python
#coding:utf8

import os

def dirList(path):
	filelist = os.listdir(path)
	for filename in filelist:
		filepath = os.path.join(path, filename)
		if os.path.isdir(filepath):
			dirList(filepath)
		print filepath

allfile = dirList('testdir')
