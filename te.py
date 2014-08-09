try:
	file = raw_input("enter the file name:")
	f = open(file)
	print 'hello'
except IOError,msg:
	print "the file doesn't exist!"
except NameError,msg:
	print "undefined var!"
finally:
	try:
		f.close()
	except NameError,msg:
		pass

if file == "hello":
	raise TypeError("nothing!!!")