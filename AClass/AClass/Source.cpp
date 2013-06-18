#include <iostream>

using namespace std;

class Point
{
private:
	double x;
	double y;
public:
	Point(double xx,double yy){x=xx;y=yy;}
	friend Point operator+(const Point&,const Point&);
	void display();
};

Point operator+(const Point& a,const Point& b)
{
	double x,y;
	x=a.x+b.x;
	y=a.y+b.y;
	return Point(x,y);
}

void Point::display()
{
	cout<<"("<<x<<","<<y<<")"<<endl;
}

int main()
{
	Point A(3,4);
	Point B(45,34);
	Point C=A+B;
	C.display();
	system("pause");

	return 0;
}