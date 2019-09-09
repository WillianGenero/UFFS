module piscaled(
	input CLOCK_50,
	input [9:0] SW,
	output [9:0]LEDR
);

reg [25:0]contador = 0;
reg l = 0;
reg l1 = 1;
reg [6:0]tempo = 1;

assign LEDR[0] = l;
assign LEDR[1] = l1;
assign LEDR[2] = l;
assign LEDR[3] = l1;
assign LEDR[4] = l;
assign LEDR[5] = l1;
assign LEDR[6] = l;
assign LEDR[7] = l1;
assign LEDR[8] = l;
assign LEDR[9] = l1;

always @(posedge CLOCK_50) begin
	
	if(contador >= 50000000) begin
		contador = 0;
		l = ~l;
		l1 = ~l1;
	end
	else
	contador = contador + tempo;
	
	if(SW[0]==1)begin
		tempo = 1;
	end
	
	else if(SW[1]==1)begin
		tempo = 2;
	end
	
	else if(SW[2]==1)begin
		tempo = 5;
	end
	
	else if(SW[3]==1)begin
		tempo = 10;
	end
	
	else if(SW[4]==1)begin
		tempo = 20;
	end
	
	else if(SW[5]==1)begin
		tempo = 50;
	end
	
	else if(SW[6]==1)begin
		tempo = 100;
	end

end

endmodule
