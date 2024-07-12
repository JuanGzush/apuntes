package tema9_Fechas;

import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

public class ClassDateTimeFormatter {

	public void show() {

		LocalDateTime localDateTime;

		//Formato predefinido ISO_ORDINAL_DATE: año y día del año
		DateTimeFormatter formatter = DateTimeFormatter.ISO_ORDINAL_DATE;
		System.out.printf("Formato predefinido ISO_ORDINAL_DATE: %s", formatter.format(LocalDate.now()));

		//Creación de patrones basados en secuencia de letras y símbolos
		formatter = DateTimeFormatter.ofPattern("d M y");
		System.out.printf("\n\nPatrón \"%s\": %s", "d M y", formatter.format(LocalDate.now()));
		formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
		System.out.printf("\nPatrón \"%s\": %s", "dd/MM/yyyy", formatter.format(LocalDate.now()));
		formatter = DateTimeFormatter.ofPattern("d MMM yy");
		System.out.printf("\nPatrón \"%s\": %s", "d MMM yy", formatter.format(LocalDate.now()));
		formatter = DateTimeFormatter.ofPattern("dd-MMMM-yyyy");
		System.out.printf("\nPatrón \"%s\": %s", "dd-MMMM-yyyy", formatter.format(LocalDate.now()));

		//Uso de método parse con formato
		formatter = DateTimeFormatter.ofPattern("d MMMM uu HH:mm:ss");
		localDateTime = LocalDateTime.parse("7 febrero 22 10:01:30", formatter);
		System.out.printf("\n\nFecha y hora obtenida a partir de una cadena y un formato: %s", localDateTime);

	}

	public static void main(String[] args) {

		new ClassDateTimeFormatter().show();

	}

}
