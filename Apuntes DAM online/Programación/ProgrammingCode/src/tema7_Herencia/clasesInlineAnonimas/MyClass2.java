package tema7_Herencia.clasesInlineAnonimas;

import static tema1_11_EscrituraEnPantalla.colores.Colors.*;

public class MyClass2 implements Message {

	@Override
	public void showMessage() {
		System.out.println(RED + "Clases inline anónimas" + RESET);
	}

}
