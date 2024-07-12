package tema9_Fechas;

import java.util.concurrent.TimeUnit;

public class EnumTimeUnit {

	public void show() {

		try {
			for (int i = 0; i < 5; i++) {
				System.out.printf("Iteración %d\n", i);
				TimeUnit.SECONDS.sleep(2);//Se duerme durante 2 segundos
			}
		} catch (InterruptedException e) {
			System.out.println("Interrupción mientras se duerme");
		}

	}

	public static void main(String[] args) {

		new EnumTimeUnit().show();

	}

}
