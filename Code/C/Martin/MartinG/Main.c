#include <stdio.h>
#include <stdlib.h>
#include "Header.h"



void main(int argc, char* argv[]) {
	//int nombre_iles = *(argv[0]);

	Coord posMax;
	Coord pos; Coord pos2;

	posMax.x = 20;//*(argv[1]);
	posMax.y = 20;//*(argv[2]);
	

	pos.x = 2; pos.y = 3;
	pos2.x = 4; pos2.y = 5;
	char* Board = Init_board_Game(posMax);
	srand(time(NULL));

	Print_board(Board, posMax);

	Place_bridge_on_map(Board, posMax, pos, 1);
	Place_island_on_map(Board, posMax, pos2, 2);
	printf("\n");

	Print_board(Board, posMax);
	printf("\n");

	char* Board2 = Init_board_Game(posMax);
	Map_gen(Board2, posMax, pos, 20);
	
	printf("\n");

	Print_board(Board2, posMax);
	

}