#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

#define X 5
#define Y 7
void main() {



	Coord posMax = { Y, X }; //{ *(argv[1]), *(argv[2])} 
	Coord pos = { Random(0, posMax.x), Random(0, posMax.y) };
	//
	char board[Y * X] = { "*****1*3*********4*********4*2*****" };

	solveur(board, pos, posMax);

}