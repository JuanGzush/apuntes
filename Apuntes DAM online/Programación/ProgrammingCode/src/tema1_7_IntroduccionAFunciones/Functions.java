package tema1_7_IntroduccionAFunciones;

public class Functions {

	public static void main(String[] args) {

		boolean par;
		int result;

		par = isPar(5);//Se llama a la función isPar con un valor de 5 en el argumento
		System.out.println(par);//Mostrará false
		par = isPar(4);//Se llama a la función isPar con un valor de 4 en el argumento
		System.out.println(par);//Mostrará true

		result = add(5, 2);//Se llama a la función add con los valores 5 y 2 en los argumentos
		System.out.println(result);//Mostrará 7

	}

	public static boolean isPar(int n) {

		if (n % 2 == 0) {
			return true;
		} else {
			return false;
		}

	}

	public static int add(int sum1, int sum2) {

		return sum1 + sum2;

	}

}
