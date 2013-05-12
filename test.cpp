#include <iostream>
#include "list.h"

using namespace std;

int main()
{
	List A;
	A.insert(1);
	A.insert(2);
	A.insert(3);
	A.travel();
	system("pause");
	return 0;
}