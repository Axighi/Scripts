using System;
// A "Hello World!" program in C#
namespace HelloWorld
{
    class Hello 
    {
    	class Person{
    		public string Name{ get; set; }
    		public int Age{ get; set;}
    		
    	}
        static void Main(string[] args) 
        {
        	foreach(string s in args)
            	System.Console.WriteLine(s);
        }
    }
}