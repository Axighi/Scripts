#!/usr/bin/python
# -*- coding: utf-8 -*-

import Tkinter 
import re
import os
from os.path import basename
from tkFileDialog import askopenfilename

def convert(degMinSec):
  pattern = '\d+\.?\d*'
  numbers = re.findall(pattern, degMinSec)
  if len(numbers) == 3:
    degree = numbers[0]
    minute = numbers[1]
    second = numbers[2]
    return str(float(degree) + float(minute)/60 + float(second)/3600)[:12]
  else:
    return ''

def start(file):
  path = raw_input('Input file path：')
  if path == '':
    print('choose a file!')
  else:
    fileExtension = os.path.splitext(path)[1]
    if fileExtension != 'txt':
      print('Unsupported file format!')
    else:
      fin = open(path)

      inputFileName = basename(path)
      if re.search('latitude', inputFileName) != None:
        outPrefix = 'latitude_'
      elif re.search('longtitude', inputFileName) != None:
        outPrefix = 'longtitude_'
      else:
        outPrefix= 'unknown_'
      fout = open(outPrefix + inputFileName, 'w')

      lines = fin.readlines()
      for i in range(len(lines)):
        if lines[i] == '\n' or lines[i].strip() == '无':
          fout.write('\n')
        else:
          fout.write(convert(lines[i].strip()))
          fout.write('\n')

      fout.close()
      fin.close()

def openFile():
  return askopenfilename()
  
top = Tkinter.Tk()
top.geometry('500x200+200+200')
label = Tkinter.Label(top, text = 'Choose a file：').pack()
# e = Tkinter.StringVar()
#path = Tkinter.Entry(top)
# e.set('input your file path')
#path.pack()
convertBtn = Tkinter.Button(top, text = 'Open', command = openFile()).pack()
Tkinter.mainloop()