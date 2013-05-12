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
	~List();

	//get size of the list
	int getSize();

	//insert a at k,before node k
	void insert(int a,int k);

	//insert after the tail
	void insert(int a);

	//remove node i from list
	void remove(int k);

	//find a node by data
	void find(int a);

	//get node i
	int getNodeAt(int i);

	//travel the list
	void travel();


private:
	NODE head;  //the head node of the list
	int size;  //length of the list
};
