#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

#define X 11
#define Y 7
void main() {

	Coord posMax = { X, Y }; //{ *(argv[1]), *(argv[2])} 
	Coord pos;
	
	char** Result = (char**)malloc(sizeof(char*) * 2);

	char Board[X * Y] = { "1*****4*4*1****************************2*1***************2***3****************" };
	//char Board[X * Y] = { "*1*2*****************3*5*******1*2*" };
	pos.x = 0;
	pos.y = 0;

	Solver(Result, Board, posMax, pos, NULL);
	Print_board(Board, posMax);
	if (Result != NULL) {
		for (int i = 0; i < 2; i++) {
			Print_board(Result[i], posMax);
		}
	}
}