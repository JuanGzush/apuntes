package tema2_3_Funciones;

public class Functions1 {

	public static void main(String[] args) {

		boolean pair;
		int result;

		/* 
		 * Se llama a la función isPair con un valor de 5 en el argumento, es decir, 
		 * el valor inicial del parámetro n es 5:
		 */
		pair = isPair(5);
		System.out.println(pair);//Mostrará false

		/* 
		 * Se llama a la función isPair con un valor de 4 en el argumento, es decir, 
		 * ahora el valor inicial del parámetro n es 4:
		 */
		pair = isPair(4);
		System.out.println(pair);//Mostrará true

		/*
		 * Se llama a la función add con los valores 5 y 2 en los argumentos, es decir, 
		 * los valores iniciales de los parámetros sum1 y sum2 son 5 y 2 respectivamente:  
		 */
		result = add(5, 2);
		System.out.println(result);//Mostrará 7

	}

	public static boolean isPair(int n) {

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
