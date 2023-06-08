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

	Coord posMax = { (argv[1]), (argv[2]) };
	Coord pos;
	int Nb_bridge = atoi(argv[3]);
	int Nb_island;

	char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));;
	strncpy_s(Board, ((posMax.x * posMax.y) + 1) * sizeof(char), (argv[4]), _TRUNCATE);

	pos.x = 0;
	pos.y = 0;

	Nb_island = Island_on_map(Board, pos, posMax);

	Bridge* Bridges = (Bridge*)malloc(sizeof(Bridge) * Nb_bridge);
	Island* Islands = (Island*)malloc(sizeof(Island) * Nb_island);

	Stock_island(Islands, posMax, Board);
	Stock_bridge(Bridges, posMax, Board);

	From_C_to_Json(Bridges, Islands, 14, Nb_island, posMax, 1);

}