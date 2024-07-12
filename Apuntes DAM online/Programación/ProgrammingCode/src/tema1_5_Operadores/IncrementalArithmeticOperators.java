package tema1_5_Operadores;

public class IncrementalArithmeticOperators {

	public static void main(String[] args) {

		int integer1, integer2;
		char character1, character2;

		character1 = 'C';//Unicode 67
		character1++;
		System.out.println(character1);//Al incrementarse vale 'D', Unicode 68

		/*
		 * También se pueden utilizar los caracteres con los operadores
		 * aritméticos, pero entonces hace falta usar casting:
		 */
		character2 = (char) (character1 + 6);
		System.out.println(character2);//character2 vale 'J', Unicode 74	
		integer1 = character2 + 2;
		System.out.println(integer1);//integer1 vale 76
		character2++;
		System.out.println(character2);//character2 vale 'K', Unicode 75
		integer1 = character2;
		System.out.println(integer1);//integer1 vale 75		

		integer1 = 5;
		integer2 = integer1++;
		System.out.println(integer1); //integer1 vale 6
		System.out.println(integer2); //integer2 vale 5
		integer1 = 5;
		integer2 = ++integer1;
		System.out.println(integer1); //integer1 vale 6
		System.out.println(integer2); //integer2 vale 6

	}

}
