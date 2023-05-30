#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

#define X 5
#define Y 7
void main() {

	Coord posMax = { X, Y }; //{ *(argv[1]), *(argv[2])} 
	Coord pos;
	
	char** Result = (char**)malloc(sizeof(char*) * 2);

	char Board[X * Y] = { "*1*2*****************3*5*******1*2*" };
	//char Board[X * Y] = { "*1*******************3*4***********" };
	pos.x = 0;
	pos.y = 0;
	//solveur(board, pos, posMax);
	Solver(Result, Board, posMax, pos, NULL);
	if (Result != NULL) {
		for (int i = 0; i < 2; i++) {
			//Print_board(Result[i], posMax);
		}
	}
}