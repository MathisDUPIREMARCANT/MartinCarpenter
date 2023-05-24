#include <stdio.h>
#include <stdlib.h>
#include "Header.h"

#define I 15
#define X 15
#define Y 20



void main(int argc, char *argv[]) {

	srand(time(NULL));
	int nombre_iles = atoi(argv[1]);
	int nombre_x = atoi(argv[2]);
	int nombre_y = atoi(argv[3]);
	//int nombre_iles = *(argv[0]);
	Coord posMax = { nombre_x, nombre_y}; //{ *(argv[1]), *(argv[2])} 
	Coord pos = { Random(0, posMax.x), Random(0, posMax.y) };

	char* Board = Init_board_Game(posMax);


	int test = Map_gen(Board, posMax, pos, nombre_iles);
	//printf("\n\nTest : %d\n", test);

	while (test == -1) { 
		Board = Init_board_Game(posMax);
		test = Map_gen(Board, posMax, pos, nombre_iles);
		//printf("\n\nTest : %d\n", test);
	}

	//Print_board(Board, posMax);
	//free(Board);

}