package tema6_3_ArgumentosVariables;

public class Varargs1 {

	public void show() {

		System.out.println(add());
		System.out.println(add(1));
		System.out.println(add(new int[] { 1 }));// También se le puede pasar un array
		System.out.println(add(1, 2));
		System.out.println(add(1, 2, 3));
		System.out.println(add(1, 2, 3, 4));
		System.out.println(add(new int[] { 1, 2, 3, 4 }));

	}

	public int add(int... nums) {

		int sum = 0;

		for (int i = 0; i < nums.length; i++) {
			sum += nums[i];
		}
		return sum;

	}

	public static void main(String[] args) {

		new Varargs1().show();

	}

}
