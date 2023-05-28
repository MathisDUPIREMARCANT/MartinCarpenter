#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void Solver(char** Result, char* Board, Coord posMax, Coord pos, int Direction[4]) {

	int* Next_possibilities = (int*)malloc(12 * sizeof(int) * 4);

	if (Next_possibilities != NULL) {

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

					Create_bridge(Board, posMax, &Copy_pos, Length, i, Direction[i]);

					Next_Coord(&Copy_pos, i);

					Place_island_on_map(Board, posMax, Copy_pos, Peek_island_number(Board, posMax, Copy_pos, i, 0) - Direction[i]);
				}
			}

			Place_island_on_map(Board, posMax, pos, Peek_island_number(Board, posMax, Copy_pos, 0, 0) - Type_island);
		}

		int Nb_islands = Island_on_map(Board, pos, posMax);
		pos = Find_Island(Board, posMax);

		int Nb_combinaison = 2;

		char* Board_copy;

		strcpy(Board_copy, Board);

		for (int i = 0; i < Nb_combinaison; i++) {
			Solver(Result, Board_copy, posMax, pos, Next_possibilities[i]);
		}
	}
}

Peek_island_number(char* Board, Coord posMax, Coord pos, int Direction, int Length) {

	if (Length == 0) { return atoi(*(Board + (posMax.x * (pos.y) + pos.x))); }


	switch (Direction) {

	case(0):
		return atoi(*(Board + (posMax.x * (pos.y - (Length + 1)) + pos.x)));
		break;

	case(1):
		return atoi(*(Board + (posMax.x * (pos.y) + pos.x + Length + 1)));
		break;

	case(2):
		return atoi(*(Board + (posMax.x * (pos.y + (Length + 1)) + pos.x)));
		break;

	case(3):
		return atoi(*(Board + (posMax.x * (pos.y) + pos.x - (Length + 1))));
		break;
	}
}


