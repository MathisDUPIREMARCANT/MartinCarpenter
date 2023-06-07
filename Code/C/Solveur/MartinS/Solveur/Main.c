#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

// -*- coding: utf-8 -*-


#define X 16
#define Y 16


void main(int argc, char* argv[]) {

	//Coord posMax = { atoi(argv[1]), atoi(argv[2]) }; //{ *(argv[1]), *(argv[2])} 
	Coord posMax = { X, Y };
	Coord pos;

	char* Save = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));
	char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));
	//strncpy_s(Board, ((posMax.x * posMax.y) + 1) * sizeof(char), (argv[3]), _TRUNCATE);
	//strncpy_s(Save, ((posMax.x * posMax.y) + 1) * sizeof(char), (argv[3]), _TRUNCATE);

	strncpy_s(Board, ((posMax.x * posMax.y) + 1) * sizeof(char), "**********************3**3****************************************************************************************************************************************3***6**6***3************************************3***4**4***3**********************************", _TRUNCATE);
	strncpy_s(Save, ((posMax.x * posMax.y) + 1) * sizeof(char), Board, _TRUNCATE);

	pos.x = 0;
	pos.y = 0;

	Solver(Save, Board, posMax, pos, NULL);
	/*Print_board(Save, Board, posMax);*/
	//if (Result != NULL) {
	//	for (int i = 0; i < 2; i++) {
	//		Print_board(Result[i], posMax);
	//	}
	//}
}