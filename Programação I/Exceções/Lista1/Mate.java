import java.util.*;
public class Mate{
	public double somar(double a, double b) throws Exception{
		if(a == 0 || b == 0)
			throw new ParamZeroException();
		else if(a + b == 0)
			throw new ResultadoZeroException();
		else
			return a + b;
	}
	public double subtrair(double a, double b) throws Exception{
		if(a == 0 || b == 0)
			throw new ParamZeroException();
		else if(a - b == 0)
			throw new ResultadoZeroException();
		else
			return a - b;
	}
	public double dividir(double a, double b) throws Exception{
		if(a == 0 || b == 0)
			throw new ParamZeroException();
		else if(a / b == 0)
			throw new ResultadoZeroException();
		else
			return a / b;
	}
	public double multiplicar(double a, double b) throws Exception{
		if(a == 0 || b == 0)
			throw new ParamZeroException();
		else if(a * b == 0)
			throw new ResultadoZeroException();
		else
			return a * b;
	}
}