#include <stdio.h>
#include <stdlib.h>


void main() {
	int Xmax; int Ymax;

	char* Board = malloc((Xmax * Ymax) * sizeof(char));

	Init_board_Game(&Board, Xmax, Ymax);

	int startx = Random_number(Xmax);
	int starty = Random_number(Ymax);



}