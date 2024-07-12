package tema11_Colecciones.mapas;

import java.util.HashMap;
import java.util.Map;

public class ShowHashMap {

	public void show() {

		Map<String, Vehicle> map = new HashMap<>();
		Map<String, Vehicle> map2 = new HashMap<>();
		Vehicle vehicles[] = new Vehicle[6];
		vehicles[0] = new Vehicle("9685KMX", 4, "azul");
		vehicles[1] = new Vehicle("1235GTR", 2, "rojo");
		vehicles[2] = new Vehicle("7314QWE", 4, "verde");
		vehicles[3] = new Vehicle("5930POI", 2, "negro");
		vehicles[4] = new Vehicle("1705UBG", 4, "blanco");
		vehicles[5] = new Vehicle("3495JZA", 2, "naranja");
		for (int i = 0; i < vehicles.length; i++) {
			map.put(vehicles[i].getRegistration(), vehicles[i]);
		}

		System.out.println(map.containsKey("1005SAW"));//false
		System.out.println(map.containsKey("1705UBG"));//true
		System.out.println(map.containsValue(new Vehicle("5930POI", 4, "negro")));//false
		System.out.println(map.containsValue(new Vehicle("5930POI", 2, "negro")));//true
		System.out.println(map.get("4554ASD"));//null
		System.out.println(map.get("1705UBG"));//Vehicle [registration=1705UBG, wheelCount=4, speed=0.0, colour=blanco]
		System.out.println(map.getOrDefault("8080SAS", new Vehicle("4554ASD", 4, "negro")));//Vehicle [registration=4554ASD, wheelCount=4, speed=0.0, colour=negro]
		System.out.println(map.getOrDefault("1705UBG", new Vehicle("4554ASD", 4, "negro")));//Vehicle [registration=1705UBG, wheelCount=4, speed=0.0, colour=blanco]
		System.out.println(map.put("6320LPL", new Vehicle("6320LPL", 2, "verde")));//null
		System.out.println(map.put("6320LPL", new Vehicle("6320LPL", 4, "beis")));//Vehicle [registration=6320LPL, wheelCount=2, speed=0.0, colour=verde]
		System.out.println(map.putIfAbsent("4687RTB", new Vehicle("4687RTB", 2, "blanco")));//null
		System.out.println(map.putIfAbsent("4687RTB", new Vehicle("4687RTB", 4, "naranja")));//Vehicle [registration=4687RTB, wheelCount=2, speed=0.0, colour=blanco]
		System.out.println(map.remove("1234ABC"));//null
		System.out.println(map.remove("4687RTB"));//Vehicle [registration=4687RTB, wheelCount=2, speed=0.0, colour=blanco]

		System.out.printf("El mapa tiene %d vehículos", map.size());
		map2.put("7410HJH", new Vehicle("7410HJH", 4, "rojo"));
		map2.put("8520FGF", new Vehicle("8520FGF", 2, "verde"));
		map.putAll(map2);//añade a map los pares clave-valor del mapa map2
		System.out.printf("\nDespués de añadirle map2, el mapa tiene %d vehículos", map.size());

	}

	public static void main(String[] args) {

		new ShowHashMap().show();

	}

}
