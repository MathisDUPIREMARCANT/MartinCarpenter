#include <stdio.h>
#include <stdlib.h>
#include "Header.h"
#include "Function.c"


void main(int argc, char* argv[]) {
	int nombre_iles = *(argv[0]);
	Coord posMax;Coord pos;
	posMax.x = 5;//*(argv[1]);
	posMax.y = 6;//*(argv[2]);
	pos.x = Random(posMax.x - 1); pos.y = Random(posMax.y - 1);
	char* Board = Init_board_Game(posMax);
	Map_mading(Board, posMax, pos, nombre_iles);
	Affichage_board(Board, posMax);

	
	

}