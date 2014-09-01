using System;
// A "Hello World!" program in C#
namespace HelloWorld
{
    class Hello 
    {
        static void Main(string[] args) 
        {
        	foreach(string s in args)
            	System.Console.WriteLine(s);
        }
    }
}