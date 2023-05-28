#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

#define X 5
#define Y 7
void main() {

	char** Result;

	Coord posMax = { Y, X }; //{ *(argv[1]), *(argv[2])} 
	Coord pos;
	
	//Result = (char**)malloc(sizeof(char*));

	char Board[Y * X] = { "*****1*3*********4*********4*2*****" };
	pos.x = 0;
	pos.y = 0;
	//solveur(board, pos, posMax);
	Solver(Result, Board, posMax, pos, NULL);
}