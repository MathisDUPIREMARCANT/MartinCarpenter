#include <stdio.h>
#include <stdlib.h>
#include "Header.h"



void main(int argc, char* argv[]) {
	//int nombre_iles = *(argv[0]);
	srand(time(NULL));
	Coord posMax;
	Coord pos; Coord pos2;

	posMax.x = 10;//*(argv[1]);
	posMax.y = 10;//*(argv[2]);
	

	pos.x = 2; pos.y = 3;
	/*pos2.x = 4; pos2.y = 5;
	char* Board = Init_board_Game(posMax);
	

	Print_board(Board, posMax);

	Place_bridge_on_map(Board, posMax, pos, 1);
	Place_island_on_map(Board, posMax, pos2, 2);
	printf("\n");

	Print_board(Board, posMax);
	printf("\n");

	*/
	char* Board = Init_board_Game(posMax);
	Map_gen(Board, posMax, pos,4);	
	Print_board(Board, posMax);
	free(Board);

}