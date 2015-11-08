#!/usr/bin/env python
# -*- coding: utf-8 -*-
from xlrd import open_workbook

class Instruction(object):
    def __init__(self, key, title, content):
        self.key = key
        self.title = title
        self.content = content

    def __str__(self):
        return('{0}: \'{1}\',\n'
            '{0}Info: \'{2}\',').format(self.key.encode('utf8'), self.title.encode('utf8'), self.content.encode('utf8'))

wb = open_workbook('instructions.xls')
for sheet in wb.sheets():
    number_of_rows = sheet.nrows
    number_of_columns = sheet.ncols

    items = []
    rows = []

    for row in range(1, number_of_rows):
        values = []
        for col in [1, 7, 8]:
            value  = sheet.cell(row, col).value
            try:
                value = str(value)
            except ValueError:
                pass
            finally:
                values.append(value)
        item = Instruction(*values)
        items.append(item)

for item in items:
    print item

f = open('temp.txt', 'w')
for item in items:
f.write(item)
