#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void Solver(char** Result, char* Board, Coord posMax, Coord pos, int* Direction) {

	int Direction_available[4];
	int* result = malloc(sizeof(int) * 4 * 81);



	if (result != NULL) {

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

					Create_bridge(Board, posMax, &Copy_pos, Length, i, Direction[i]-1);

					Next_Coord(&Copy_pos, i);

					if ((atoi(Board + (Copy_pos.y * posMax.x) + Copy_pos.x) - Direction[i]) < 0) { return; }

					Place_island_on_map(Board, posMax, Copy_pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Direction[i]);


					
					// if Peek_island_number(Board, posMax, Copy_pos, i, 0) - Direction[i] < 0 alors on casse la recursivite
				}
			}

			Place_island_on_map(Board, posMax, pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Type_island);
		}

		int Nb_islands = Island_on_map(Board, pos, posMax);

		if (Nb_islands == 0) {
			*(Result) = Board;
			return;
		}

		pos = Find_Island(Board, posMax);
		

		for (int i = 0; i < 4; i++) {
			Direction_available[i] = Peek_island_number(Board, posMax, pos, i, Length_next_island(Board, posMax, pos, i));
		}


		int* result = malloc(sizeof(int) * 4 * 81);
		int Nb_combinaison = Enumeration(Board, pos, posMax, result, &Direction_available) ;

		if (Nb_combinaison == 0 && atoi(Board + (pos.y * posMax.x) + pos.x)) { return; }


		for (int y = 0; y < Nb_combinaison; y++) {
			char* Board_copy = (char*)malloc(strlen(Board) * sizeof(char));

			if (Board_copy != NULL) {
				Copy_board(Board_copy, Board, posMax.x * posMax.y);
			}

			Solver(Result, Board_copy, posMax, pos, result + (4 * y));		
		}
		return;
	}
}

Peek_island_number(char* Board, Coord posMax, Coord pos, int Direction, int Length) {

	switch (Direction) {

	case(0):
		return atoi((Board + (posMax.x * (pos.y - (Length + 1)) + pos.x)));
		break;

	case(1):
		return atoi((Board + (posMax.x * (pos.y) + pos.x + Length + 1)));
		break;

	case(2):
		return atoi((Board + (posMax.x * (pos.y + (Length + 1)) + pos.x)));
		break;

	case(3):
		return atoi((Board + (posMax.x * (pos.y) + pos.x - (Length + 1))));
		break;
	}
}


