module CalcularArea(
  input [9:0] xA,
	input [9:0] yA,
	input [9:0] xB,
	input [9:0] yB,
	input [9:0] xC,
	input [9:0] yC,
	output  [12:0] saida
); 
	
	reg [12:0] area = 0;
	assign saida = area;

  //Cálculo de determinante
  assign det = ((xA * yB) + (yA * xC) + (xB*yC) - ((xC*yB) + (yC*xA) + (xB*yA)));

   always @( xA or yA or xB or yB or xC or yC) begin
      area  <= $abs(det);
  end
endmodule

module TestaPonto(
	input [9:0] xA,
	input [9:0] yA,
	input [9:0] xB,
	input [9:0] yB,
	input [9:0] xC,
	input [9:0] yC,
	input [9:0] xP,
	input [9:0] yP,
	output Verificado
);

  //Triangulão
  wire signed [12:0] A1;
  //Triangulinhos com o ponto
  wire signed [12:0] A2;
  wire signed [12:0] A3;
  wire signed [12:0] A4;

  CalcularArea Area1(xA, yA, xB, yB, xC, yC, A1);
  CalcularArea Area2(xA, yA, xB, yB, xP, yP, A2);
  CalcularArea Area3(xA, yA, xP, yP, xC, yC, A3);
  CalcularArea Area4(xP, yP, xB, yB, xC, yC, A4);

  assign Verificado = (A1 >= (A2 + A3 + A4) ) ? 1 : 0;
endmodule

module testbench;
  reg [9:0] xA;
  reg [9:0] yA;
  reg [9:0] xB;
  reg [9:0] yB;
  reg [9:0] xC;
  reg [9:0] yC;
  reg [9:0] xP;
  reg [9:0] yP;
  wire saida;

  TestaPonto A(xA, yA, xB, yB, xC, yC, xP, yP, saida);
  initial 
	  begin
	  $dumpvars;
	  xA <= 1;
	  yA <= 1;
	  xB <= 10;
	  yB <= 10;
	  xC <= 10;
	  yC <= 1;
	  xP <= 5;
	  yP <= 4;
	  #10
	  $display("\nPonto Verificado: (%d, %d)  Pontos do Triangulo: (%d, %d), (%d, %d), (%d, %d) Resultado: %d", xP, yP, xA, yA, xB, yB, xC, yC, saida);
	  $finish;
	end
endmodule
