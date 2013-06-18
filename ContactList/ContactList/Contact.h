#include <iostream>
#include <string>

class Contact
{
	friend std::ostream& operator<<(std::ostream& os,const Contact& c);
public:
	Contact(std::string name="none");

	~Contact();

private:
	std::string name;
	Contact *next;

};

