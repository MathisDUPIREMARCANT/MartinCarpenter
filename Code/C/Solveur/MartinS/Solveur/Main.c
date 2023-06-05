#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

// -*- coding: utf-8 -*-


#define X 5
#define Y 7
void main() {

	Coord posMax = { X, Y }; //{ *(argv[1]), *(argv[2])} 
	Coord pos;
	
	char** Result = (char**)malloc(sizeof(char*));

	//char Board[X * Y] = { "1*****4*4*1****************************2*1***************2***3****************" };
	char Board[X * Y] = { "*1*2*****************3*5*******1*2*" };
	pos.x = 0;
	pos.y = 0;

	int Nb_solution = 0;
	int* Pt_solution = &Nb_solution;

	int* Nb_bridge = (int*)malloc(sizeof(int));
	if (Nb_bridge == NULL) {
		printf("Bug");
		return;
	}
	*Nb_bridge = 0;

	int Nb_island = 0;
	int* Pt_island = &Nb_island;

	Bridge* Bridges = (Bridge*)malloc(sizeof(Bridge*));
	Nb_island = Island_on_map(Board, pos, posMax);
	Island* Islands = (Island*)malloc(Nb_island * sizeof(Island*));


	Stock_island(Islands, posMax, Board);
	Solver(Result, Board, posMax, pos, NULL, Pt_solution, Nb_bridge, Bridges);
	
	Print_board(Board, posMax);
	
	
	if (Result != NULL && Nb_solution) {
		Print_board(*Result, posMax);
		From_C_to_Json(Bridges, Islands, Nb_bridge, Nb_island, posMax, *Pt_solution);
	}
}