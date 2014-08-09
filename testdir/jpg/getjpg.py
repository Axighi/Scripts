#!/usr/bin/python 
# -*- coding: utf-8 -*-  

import re
import urllib

def getHtml(url):
	page = urllib.urlopen(url)
	html = page.read()
	return html

def getImg(html):
	reg = r'src="(.*?\.jpg)"'
	imgre = re.compile(reg)
	imglist = re.findall(imgre,html)
	x = 20
	for imgurl in imglist:
		urllib.urlretrieve(imgurl,'%s.jpg' % x)
		x+=1


html = getHtml(raw_input("enter the url:"))
print getImg(html)