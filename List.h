#include <iostream>
 
//define a list node struct
typedef struct NODE
{
	int data;  //data
	struct NODE *next;  //a pointer to next node

	//first constructor,only set next=null
	NODE()
	{
		next=NULL;
	}

	//second constructor,set a value to data
	NODE(int a)
	{
		data=a;
		next=NULL;
	}
}NODE;
//NODE==struct NODE_    define a new node

class List
{
public:
	List();
	virtual ~List();

	//get size of the list
	int getLength();

	//insert a at k,before node k
	void insert(int a,int k);

	//remove node i from list
	void remove(int i);

	//find a node by its data
	void find(int a);

	//get node i
	int getNode(int i);

private:
	NODE head;  //the head node of the list
	int length;  //length of the list
};
