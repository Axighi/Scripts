
#include <iostream>
#include <string>
#include "list.h"

// NODE::NODE()
// {
// 	next=NULL;
// }

// NODE::NODE(int a)
// {
// 	data=a;
// 	next=NULL;
// }

//List constructor,new a head node
List::List()
{
	
	size=0;
	head=NODE();
}

//List destructor
List::~List()
{
	while(head.next!=NULL)
	{
		NODE temp=head;
		delete &head;
		head=temp;
		size--;
	}
}


int List::getLength()
{
	return length;
}

void List::insert(int a,int k)
{
	if (k<-1||k>length-1)
	{
		std::cout<<"illegal insert position!"<<std::endl;
		return 0;
	}
	else
	{
		
	}

}

void List::remove(int i)
{

}

void List::find(int a)
{

}

int List::getNode(int i)
{

}

