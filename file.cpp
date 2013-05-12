#include <iostream>
#include <string>
#include <fstream>


using namespace std;

int main(int argc, char const *argv[])
{
	//declare the variable of type ofstream
	  //since you are dealing with output:
	  ofstream myfile;
	  
	  //function to open the file which includes
	  //the file name:
	  myfile.open ("stuff.txt");
	  
	  //check if the file is open with the is_open() 
	  //function:
	  if(myfile.is_open()){

	      //preform the operation(s):
	      myfile << "Hello world!  This is output!" << endl;

	      //function to close the file:
	      myfile.close();
	  }else{

	      //is_open() returned false and there is a problem:
	      cout << "Can't open the file!" << endl;
	  }

	  string line;
	  
	  ifstream ifile("stuff.txt");
	  //check to see if the file is opened:
	    if (ifile.is_open())
	    {
	      //while there are still lines in the
	      //file, keep reading:
	      while (! ifile.eof() )
	      {
	        //place the line from myfile into the
	        //line variable:
	        getline (ifile,line);

	        //display the line we gathered:
	        cout << line << endl;
	      }

	      //close the stream:
	      myfile.close();
	    }

	    else cout << "Unable to open file";


	return 0;
}