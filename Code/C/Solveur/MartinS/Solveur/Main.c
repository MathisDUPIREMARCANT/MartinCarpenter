#include "Header.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <malloc.h>
#define _CRT_SECURE_DEPRECATE_MEMORY
#include <memory.h>

// -*- coding: utf-8 -*-


//#define X 7
//#define Y 9


void main(int argc, char* argv[]) {

	Coord posMax = { 10, 10 }; //{ *(argv[1]), *(argv[2])} 
	Coord pos;

	//Bridge** Result = (Bridge**)malloc(sizeof(Bridge*) * 10);

	//char Board[X * Y] = { "1*****4*4*1****************************2*1***************2***3****************" };
	//char Board[X * Y] = { "*1*2*****************3*5*******1*2*" };

	char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));;
	//strncpy_s(Board, _countof(Board), "*************2*5********2********14*2***************2*8****5*1*4**********************3*2***********************1*3***2***********************1******4**22**************", _TRUNCATE);
	strncpy_s(Board, ((posMax.x * posMax.y) + 1) * sizeof(char), "***********1**4**3*2************************6**2**************************3*1***********************", _TRUNCATE);

	pos.x = 0;
	pos.y = 0;

	int Nb_solution = 0;
	int* Pt_solution = &Nb_solution;

	int Nb_bridge = 0;// = (int*)malloc(sizeof(int));

	int Nb_bridge_max = 0;
	int* Pt_max = &Nb_bridge_max;

	int Nb_island = Island_on_map(Board, pos, posMax);;
	int* Pt_island = &Nb_island;

	//Bridge** Pt_bridges;
	//Bridge* Bridges = (Bridge*)malloc(sizeof(Bridge));
	//Island* Islands = (Island*)malloc(Nb_island * sizeof(Island));

	/*Pt_bridges = &Bridges;

	Stock_island(Islands, posMax, Board);*/

	Solver(Board, posMax, pos, NULL, Pt_solution, Pt_max, Nb_bridge);

	//printf("[");
	//for (int i = 0; i < Nb_solution; i++) {
	//	From_C_to_Json(*(Result + i), Islands, Nb_bridge_max, Nb_island, posMax, Nb_solution);
	//	if (i != Nb_solution - 1) {
	//		printf(",");
	//	}
	//}
	//printf("]");
	//Print_board(Board, posMax);
	//if (Result != NULL && Nb_solution) {
	//	//Print_board(*Result, posMax);
	//	//From_C_to_Json(Bridges, Islands, Nb_bridge, Nb_island, posMax);
	//}
}