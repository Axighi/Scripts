import Tkinter
class MyGUI:
  def __init__(self):
  self.main_window = Tkinter.Tk()
  self.top_frame = Tkinter.Frame(self.main_window)
  self.bottom_frame = Tkinter.Frame(self.main_window)
  self.label1 = Tkinter.Label(self.top_frame,text='Winken')
  self.label2 = Tkinter.Label(self.top_frame,text='Blinken')
  self.label3 = Tkinter.Label(self.top_frame,text='Nod')
   
  self.label1.pack(side='top')
  self.label2.pack(side='top')
  self.label3.pack(side='top')
   
  self.label4 = Tkinter.Label(self.bottom_frame,text='Winken')
  self.label5 = Tkinter.Label(self.bottom_frame,text='Blinken')
  self.label6 = Tkinter.Label(self.bottom_frame,text='Nod')
   
  self.label4.pack(side='left')
  self.label5.pack(side='left')
  self.label6.pack(side='left')
   
  self.top_frame.pack()
  self.bottom_frame.pack()
   
  Tkinter.mainloop()
mygui = MyGUI()