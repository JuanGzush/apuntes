package tema11_Colecciones.mapas;

import java.util.Map;

public enum Operation {

	PLUS("+") {
		@Override
		public double apply(double x, double y) {
			return x + y;
		}
	},
	MINUS("-") {
		@Override
		public double apply(double x, double y) {
			return x - y;
		}
	},
	TIMES("*") {
		@Override
		public double apply(double x, double y) {
			return x * y;
		}
	},
	DIVIDE("/") {
		@Override
		public double apply(double x, double y) {
			return x / y;
		}
	};

	private final String symbol;

	private static final Map<String, Operation> symbolToOperation = Map.of(Operation.PLUS.getSymbol(), Operation.PLUS,
			Operation.MINUS.getSymbol(), Operation.MINUS, Operation.TIMES.getSymbol(), Operation.TIMES,
			Operation.DIVIDE.getSymbol(), Operation.DIVIDE);

	private Operation(String symbol) {
		this.symbol = symbol;
	}

	public String getSymbol() {
		return symbol;
	}

	public abstract double apply(double x, double y);

	public static Operation fromSymbol(String symbol) {
		return symbolToOperation.get(symbol);
	}

}