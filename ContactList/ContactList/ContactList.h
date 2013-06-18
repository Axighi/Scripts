#include "Contact.h"

class ContactList
{
public:
	ContactList();
	void addToHead(const std::string&);
	
private:
	Contact *head;
	int size;

}