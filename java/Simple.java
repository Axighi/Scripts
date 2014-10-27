public class Simple{
	private int a;

	public int method(){
		int b = 0;
		a++;
		b = a;
		return b;
	}

	public static void main(String args[]){
		Simple s = null;
		int a = 0;

		s = new Simple();
		a = s.method();
		System.out.println(a);
	}
}