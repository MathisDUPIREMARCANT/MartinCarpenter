#include <stdio.h>
#include <stdlib.h>
#include "Header.h"
#include <time.h>

#define I 15
#define X 15
#define Y 20



void main(int argc, char *argv[]) {

	srand(time(NULL));
	int nombre_iles = atoi(argv[1]);
	int nombre_x = atoi(argv[2]);
	int nombre_y = atoi(argv[3]);

	//int nombre_iles = 10;
	//int nombre_x = 10;
	//int nombre_y = 10;

	Coord posMax = { nombre_x, nombre_y};
	Coord pos = { Random(0, posMax.x-1), Random(0, posMax.y-1) };

	char* Board = Init_board_Game(posMax);

	
	int test = Map_gen(Board, posMax, pos, nombre_iles);
	//Print_board(Board, posMax);
	if (test != 0) {
		printf("%d", test);
	}
	//Print_board(Board, posMax);
	free(Board);

}