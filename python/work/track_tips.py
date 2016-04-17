#!/usr/bin/env python
# -*- coding: utf-8 -*-
import sys
import json
from xlrd import open_workbook

def convert(val):
    if type(val) is float:
        return str(int(val))
    else:
        return val.encode('utf8')

class Instruction(object):
    def __init__(self, id, name, pageCategory, pageName, module, emberModule, metricType, metricName, metricDefinition, visibility):
        self.id = id
        self.name = name
        self.pageCategory = pageCategory
        self.pageName = pageName
        self.module = module
        self.emberModule = emberModule
        self.metricType = metricType
        self.metricName = metricName
        self.metricDefinition = metricDefinition
        self.visibility = visibility

wb = open_workbook(sys.argv[1])
sheet = wb.sheets()[0]
number_of_rows = sheet.nrows
number_of_columns = sheet.ncols

items = []
rows = []

for row in range(2, number_of_rows):
    values = []
    for col in xrange(10):
        value  = sheet.cell(row, col).value
        try:
            value = convert(value)
        except ValueError:
            pass
        finally:
            values.append(value)
    item = Instruction(*values)
    items.append(item)

# for item in items:
#     print item

f = open('temp.js', 'w')
f.write('[')
for item in items:
    if item.visibility == '1':
        f.write(json.dumps(item.__dict__))
        f.write(',\n')
    # print json.dumps(item.__dict__)
f.write(']')
f.close()

# f.read().replace('\"', '\'')
