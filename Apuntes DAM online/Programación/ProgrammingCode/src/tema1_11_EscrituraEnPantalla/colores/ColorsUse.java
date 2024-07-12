package tema1_11_EscrituraEnPantalla.colores;

import static tema1_11_EscrituraEnPantalla.colores.Colors.BOLD;
import static tema1_11_EscrituraEnPantalla.colores.Colors.CYAN;
import static tema1_11_EscrituraEnPantalla.colores.Colors.GREEN;
import static tema1_11_EscrituraEnPantalla.colores.Colors.GREEN_BACKGROUND;
import static tema1_11_EscrituraEnPantalla.colores.Colors.PURPLE_BACKGROUND;
import static tema1_11_EscrituraEnPantalla.colores.Colors.RED;
import static tema1_11_EscrituraEnPantalla.colores.Colors.RED_BACKGROUND;
import static tema1_11_EscrituraEnPantalla.colores.Colors.RESET;
import static tema1_11_EscrituraEnPantalla.colores.Colors.REVERSED;
import static tema1_11_EscrituraEnPantalla.colores.Colors.UNDERLINE;
import static tema1_11_EscrituraEnPantalla.colores.Colors.WHITE_BACKGROUND;
import static tema1_11_EscrituraEnPantalla.colores.Colors.YELLOW;

public class ColorsUse {

	public static void main(String[] args) {

		System.out.println(RESET + RED + "Este texto es de color rojo" + RESET);
		System.out.println("Volvemos al color por defecto");
		System.out.println(GREEN + "...y ahora es verde");
		System.out.println(PURPLE_BACKGROUND + "Fondo morado");
		System.out.println(CYAN + WHITE_BACKGROUND + "Fondo blanco con texto celeste");
		System.out.println(CYAN + WHITE_BACKGROUND + BOLD + "Fondo blanco con texto celeste en negrita");
		System.out.println(CYAN + WHITE_BACKGROUND + UNDERLINE + "Fondo blanco con texto celeste subrayado");
		System.out.printf("%s\n", YELLOW + RED_BACKGROUND + (char) 9733);// Estrella
		System.out.println(YELLOW + GREEN_BACKGROUND + "Fondo verde con texto amarillo");
		System.out.println(REVERSED + "Fondo amarillo con texto verde usando REVERSED");

	}
}
