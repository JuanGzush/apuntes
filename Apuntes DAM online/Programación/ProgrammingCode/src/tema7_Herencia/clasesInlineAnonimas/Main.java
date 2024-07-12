package tema7_Herencia.clasesInlineAnonimas;

import static tema1_11_EscrituraEnPantalla.colores.Colors.*;

public class Main {

	public void showAnonymousInnerClass() {

		MyClass anonymousInner = new MyClass() {
			public void showMessage() {
				System.out.println(RED + message + RESET);
			}
		};
		anonymousInner.showMessage();

		new MyClass() {//Lo mismo pero sin crear la variable anonymousInner
			public void showMessage() {
				System.out.println(RED + message + RESET);
			}
		}.showMessage();

	}

	public static void main(String[] args) {

		new Main().showAnonymousInnerClass();

	}

}
