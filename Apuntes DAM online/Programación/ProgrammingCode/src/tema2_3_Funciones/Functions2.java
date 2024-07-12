package tema2_3_Funciones;

public class Functions2 {

	public static void main(String[] args) {

		boolean pair;
		int result;

		pair = isPair(5);//Nace el parámetro n con el valor 5
		//Aquí n ya no existe porque la función isPair ya ha terminado de ejecutarse 
		System.out.println(pair);
		pair = isPair(4);//Vuelve a nacer n pero esta vez con un valor de 4
		//Aquí n ya no existe porque la función isPair ya ha terminado de ejecutarse 
		System.out.println(pair);

		result = add(5, 2);//Nacen los parámetros sum1 y sum2 con los valores 5 y 2 respectivamente
		//Aquí sum1 y sum2 ya no existen porque la función add ha terminado de ejecutarse
		System.out.println(result);

	}

	public static boolean isPair(int n) {//Comienzo del ámbito de vida del parámetro n

		if (n % 2 == 0) {
			return true;
		} else {
			return false;
		}

	}//Fin del ámbito de vida del parámetro n

	public static int add(int sum1, int sum2) {//Comienzo del ámbito de vida de los parámetros sum1 y sum2

		return sum1 + sum2;
	}//Fin del ámbito de vida de los parámetros sum1 y sum2

}
