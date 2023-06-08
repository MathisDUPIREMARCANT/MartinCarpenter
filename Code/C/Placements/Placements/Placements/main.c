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

	//Coord posMax = { (atoi(argv[1])), (atoi(argv[2])) };
	Coord posMax = { 7, 7 };
	Coord pos;
	//int Nb_bridge = atoi(argv[3]);
	int Nb_bridge = 0;
	int Nb_island;

	//char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));;
	//strncpy_s(Board, ((posMax.x * posMax.y) + 1) * sizeof(char), (argv[4]), _TRUNCATE);

	char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));
	strncpy_s(Board, ((posMax.x * posMax.y) + 1) * sizeof(char), "*********2**1*****************3*2***********3*3**", _TRUNCATE);

	pos.x = 0;
	pos.y = 0;

	Nb_island = Island_on_map(Board, pos, posMax);

	Bridge* Bridges = (Bridge*)malloc(sizeof(Bridge) * Nb_bridge);
	Island* Islands = (Island*)malloc(sizeof(Island) * Nb_island);

	Stock_island(Islands, posMax, Board);
	Stock_bridge(Bridges, posMax, Board, Nb_bridge);

	From_C_to_Json(Bridges, Islands, Nb_bridge, Nb_island, posMax, 1);

}