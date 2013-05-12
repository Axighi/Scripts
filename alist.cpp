#include <iostream>
#include <string>
#include "alist.h"

using namespace std;

// NODE::NODE()
// {
// 	next=NULL;
// }

// NODE::NODE(int a)
// {
// 	data=a;
// 	next=NULL;
// }

//List constructor,new a head nod
List::List()
{
	
	this.size=0;
	head=new NODE();
}

//List deconstructor
List::~List()
{
	while(this.head!=NULL)
	{
		NODE temp=head;
		delete head;
		head=temp;
		size--;
	}
}


int List::getSize()
{
	return size;
}

void List::insert(int a)
{
	if (size==0)
	{
		head.data=a;
		size++;
	}else{
		NODE *tmp;
		tmp=&head;
		while(size!=1)
		{
			tmp=tmp->next;
			size--;
		}
		NODE tmp1=new NODE(a);
		(*tmp)->next=&tmp1;
	}
}

void List::travel()
{
	NODE *tmp;
	tmp=head;
	while(size!=0)
	{
		cout<<tmp.data<<endl;
		tmp=*tmp->next;
		size--;
	}
}