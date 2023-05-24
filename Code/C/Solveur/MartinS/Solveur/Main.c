#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

#define X 5
#define Y 7
void main() {



	Coord posMax = { Y, X }; //{ *(argv[1]), *(argv[2])} 
	
	Coord pos;
	//
	char board[Y * X] = { "*****1*3*********4*********4*2*****" };
	for (int x = 0; x < posMax.x; x++) {
		for (int y = 0; y < posMax.y; y++) {
			if (!(*(board + (posMax.x * y) + x) == '*' || *(board + (posMax.x * y) + x) == '~' || *(board + (posMax.x * y) + x) == '#')) {
				pos.x = x;
				pos.y = y;
				x = posMax.x;
				y = posMax.y;
			}
		}
	}
	solveur(board, pos, posMax);

}