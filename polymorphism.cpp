class XYPos
{
public:
	XYPos();
	~XYPos();
	
};

class Shape
{
public:
	Shape();
	virtual ~Shape();
	virtual void 
};

class Ellipse : public Shape
{
public:
	Ellipse();
	~Ellipse();
	
};

class Circle : public Shape
{
public:
	Circle();
	~Circle();
	
};

void func() {
	Ellipse ell(10,20);
	ell.render();
	Circle circle(40);
	circle.render();
	render(&ell);
	render(&circle); 
}