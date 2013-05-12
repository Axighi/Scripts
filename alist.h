#include <iostream>
 

//define a list node struct
typedef struct anode_
{
 int data;  //data
 struct *anode_ next;  //a pointer to next node
}andoe;
//anode==struct anode_    define a new node
//*panode == struct anode_*      difen a pointer to the node
 
//list class
class Alist
{
public:
 Alist();
 ~Alist();
 
 //initialize a list
 void init();
 
 //get size of the list
 int getSize();
 
 //insert k at i,before node i
 void insertAt(int k,int i);
 
 //remove node i from list
 void removeAt(int i);
 
 //find a node by data
 void find(int i);
 
 //get node i
 int getNodeAt(int i);
 
 //travel the list
 void travel();
 

private:
 anode head;  //the head node of the list
 int size;  //length of the list
};
