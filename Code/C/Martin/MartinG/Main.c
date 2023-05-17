#include <stdio.h>
#include <stdlib.h>
#include "Header.h"



void main(int argc, char* argv[]) {

	srand(time(NULL));
	
	//int nombre_iles = *(argv[0]);
	Coord posMax = { 10, 10 }; //{ *(argv[1]), *(argv[2])} 
	Coord pos = { Random(0, posMax.x), Random(0, posMax.y) };

	char* Board = Init_board_Game(posMax);


	Map_gen(Board, posMax, pos,10);	

	Print_board(Board, posMax);
	free(Board);

}