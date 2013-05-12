#include <iostream>
#include <string>
#include "alist.h"

using namespace std;

//constructor,construct a empty whose head point at NULL
Alist::Alist()
{
	this.head=NULL;
	this.size=0;
}

//deconstructor
Alist::~Alist()
{
	while(this.head!=NULL)
	{
		panode temp=head.next;
		delete head;
		head=temp;
	}
}

void Alist::init()
{
	int a;

	cout<<"enter a integer:"<<endl;
	cin>>a;
}

int Alist::getSize()
{
	return this.size;
}

void Alist::insertAt(int k,int i)
{
	if (i>-1)
	{
		if (size==0)
		{	
			cout<<"the list is empty,your data has been inserted at head."<<endl;
			panode a;
				
		}
	}
}

void Alist::removeAt(int i)
{

}

void Alist::travel()
{

}