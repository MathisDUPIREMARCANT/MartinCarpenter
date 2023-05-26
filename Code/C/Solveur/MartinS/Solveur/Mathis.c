#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void Solver(char* Board, Coord posMax, Coord pos, int Direction[4]) {

	int* Next_possibilities = (int*)malloc(12 * sizeof(int) * 4);

	if (pos == NULL) { pos = { 0,0 }; }

	if (Direction != NULL) {

		Coord Copy_pos;
		int Type_island = 0;
		
		for (int i = 0; i < 4; i++) {
			Copy_pos.x = pos.x;
			Copy_pos.y = pos.y;

			if (Direction[i]) {
				int Length;
				Type_island += Direction[i];

				Length = Length_next_island(Board, posMax, pos, i);

				Create_bridge(Board, posMax, &Copy_pos, Length, i, i%2);

				Next_Coord(&Copy_pos, i);

				Place_island_on_map(Board, posMax, Copy_pos, Direction[i]);
			}
		}

		Place_island_on_map(Board, posMax, pos, Type_island);
	}

    Nb_islands = Island_on_map(Board, pos, posMax);
    pos = Find_Island(Board, posMax);

	int Nb_combinaison;

	for (int i = 0; i < Nb_combinaison; i++) {
		Solver(Board, posMax, pos, Next_possibilities[i]);
	}

}
