package tema2_2_Bucles;

public class ForEachEnum {

	public enum DayOfWeek {
		MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY, SUNDAY
	}

	public static void main(String[] args) {

		for (DayOfWeek d : DayOfWeek.values()) {
			System.out.println(d);
		}

	}

}
