#!/usr/bin/python
# -*- coding: utf-8 -*-

import Tkinter 

def convert(degMinSec):
	# print(degMinSec)
	degreePosition=degMinSec.find("°")
	degree = degMinSec[:degreePosition]
	# print(degree)
	minutePosition = degMinSec.find("\'")
	minute = degMinSec[degreePosition + 1: minutePosition]
	minute = minute[1:]
	# print(minute)
	secondPosition = degMinSec.find('''"''')
	second = degMinSec[minutePosition + 1: secondPosition]
	# print(second)
	return str(float(degree) + float(minute)/60 + float(second)/3600)[:12]

def start(file):
	# file=raw_input("请输入文件位置：")
	f=open(file)
	k=open("degreeFormat.txt",'w')
	lines = f.readlines()
	for i in range(len(lines)):
		if lines[i] == "\n":
			k.write('\n')
		else:
			coordinate = lines[i].split()
			# print(coordinate)
			longtitude = coordinate[0]
			latitude = coordinate[1]
			convertedLongtitude = convert(longtitude)
			convertedLatitude = convert(latitude)
			k.write(convertedLongtitude + "        " + convertedLatitude)
			k.write('\n')
	k.close()
	f.close()


top = Tkinter.Tk()
top.geometry('500x200+200+200')
label = Tkinter.Label(top, text = '请输入文件位置：')
label.pack()
# e = Tkinter.StringVar()
inputFile = Tkinter.Entry(top)
# e.set('input your file path')
inputFile.pack()
convertBtn = Tkinter.Button(top, text = 'Convert', command = start(inputFile.get())) 
convertBtn.pack()
Tkinter.mainloop()



