#include <stdio.h>
#include <stdlib.h>
#include "Header.h"



void main(int argc, char* argv[]) {
	//int nombre_iles = *(argv[0]);

	Coord posMax;
	Coord pos; Coord pos2;

	posMax.x = 5;//*(argv[1]);
	posMax.y = 6;//*(argv[2]);
	

	pos.x = 2; pos.y = 3;
	pos2.x = 4; pos2.y = 5;
	char* Board = Init_board_Game(posMax);
	//Map_mading(Board, posMax, pos, nombre_iles);
	Affichage_board(Board, posMax);

	Place_bridge_on_map(Board, posMax, pos, 2);
	Place_island_on_map(Board, posMax, pos2, 2);
	printf("\n");

	Affichage_board(Board, posMax);
	
	

}