#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

void Solver(Bridge** Result, char* Board, Coord posMax, Coord pos, int* Direction, int* Nb_solution, Bridge* Bridges, int Nb_bridge) {

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

					Create_bridge(Board, posMax, &Copy_pos, Length, i, Direction[i]-1, Bridges, Nb_bridge);

					Nb_bridge++;

					Next_Coord(&Copy_pos, i);

					if ((atoi(Board + (Copy_pos.y * posMax.x) + Copy_pos.x) - Direction[i]) < 0) { return; }

					Place_island_on_map(Board, posMax, Copy_pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Direction[i]);
				}
			}

			Place_island_on_map(Board, posMax, pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Type_island);
		}

		int Nb_islands = Island_on_map(Board, pos, posMax);

		if (Nb_islands == 0) {
			*(Result) = Bridges;
			(*Nb_solution)++;
			printf("Prout");
			printf("\n");
			Print_board(Board, posMax);
			printf("\n");
			return;
		}

		pos = Find_Island(Board, posMax);
		

		for (int i = 0; i < 4; i++) {
			Direction_available[i] = Peek_island_number(Board, posMax, pos, i, Length_next_island(Board, posMax, pos, i));
		}

		int Nb_combinaison = Enumeration(Board, pos, posMax, result, &Direction_available) ;

		if (Nb_combinaison == 0 && atoi(Board + (pos.y * posMax.x) + pos.x)) { return; }


		for (int y = 0; y < Nb_combinaison; y++) {
			char* Board_copy = (char*)malloc(strlen(Board) * sizeof(char));
			Bridge* Bridge_copy = (Bridge*)malloc(Nb_bridge * sizeof(Bridge*));

			if (Board_copy != NULL && Bridge_copy != NULL) {
				Copy_board(Board_copy, Board, posMax.x * posMax.y);
				if (Nb_bridge > 0) {
					Copy_bridges(Bridge_copy, Bridges, Nb_bridge);
				}
			}
			else {
				printf("Erreur d'allocation");
				return;
			}

			Solver(Result, Board_copy, posMax, pos, result + (4 * y), Nb_solution, Bridge_copy, Nb_bridge);
		}
		return;
	}
}
