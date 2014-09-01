#include <iostream>
#include <fstream>

using namespace std;

void sort(std::vector<int>& v){
	int count = v.size();
	bool tag = false;
	for (int i = 0; i < count; ++i)
	{
		for (int j =0 ; j < count - i - 1; ++i)
		{
			if (v[j] > v[j+1])
			{
				tag = true;
				int temp = v[j];
				v[j] = v[j+1];
				v[j+1] = temp;
			}
		}
		if (!tag)
		{
			break;
		}
	}
}

int main(){
	
	return 0;
}