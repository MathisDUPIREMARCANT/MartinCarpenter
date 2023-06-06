#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <malloc.h>
#define _CRT_SECURE_DEPRECATE_MEMORY
#include <memory.h>

void Solver(Bridge** Result, char* Board, Coord posMax, Coord pos, int* Direction, int* Nb_solution, int* Nb_bridge_max, int Nb_bridge, Bridge** Bridges) {

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



					Create_bridge(*Bridges, Board, posMax, &Copy_pos, Length, i, Nb_bridge, Direction[i] - 1);

					int nb = _msize(*Bridges) / sizeof(Bridge);

					if (nb > *Nb_bridge_max) {
						*Nb_bridge_max = nb;
					}

					Nb_bridge++;
					Bridge* buffer = (Bridge*)malloc(_msize(*Bridges) + sizeof(Bridge));
					if (buffer != NULL) {
						memcpy(buffer, *Bridges, _msize(*Bridges) + sizeof(Bridge));
						//Copy_bridges(buffer, Bridges, Nb_bridge);
						free(*Bridges);
						*Bridges = buffer;
						buffer = NULL;
					}

					Next_Coord(&Copy_pos, i);

					if ((atoi(Board + (Copy_pos.y * posMax.x) + Copy_pos.x) - Direction[i]) < 0) { return; }

					Place_island_on_map(Board, posMax, Copy_pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Direction[i]);
				}
			}

			Place_island_on_map(Board, posMax, pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Type_island);
		}

		int Nb_islands = Island_on_map(Board, pos, posMax);

		if (Nb_islands == 0) {

			//Result = realloc(Result, sizeof(Bridge*) * (*Nb_solution + 1));
			*(Result + *Nb_solution) = malloc(sizeof(Bridge) * Nb_bridge);
			memcpy(*(Result + *Nb_solution), *Bridges, sizeof(Bridge) * Nb_bridge);

			for (int i = 0; i < Nb_bridge; i++) {
				(*(Result + *Nb_solution))[i].pos = malloc(sizeof(Coord) * (*(Result + *Nb_solution))[i].length);
				memcpy((*(Result + *Nb_solution))[i].pos, (*Bridges)[i].pos, sizeof(Coord) * (*(Result + *Nb_solution))[i].length);
			}
			//for (int i = 0; i < Nb_bridge; i++) {
			//	int L = (*(Result + *Nb_solution + i))->length;
			//	(*(Result + *Nb_solution + i))->pos = malloc(sizeof(Coord) * L);
			//	memcpy((*(Result + *Nb_solution + i))->pos, (*Bridges)[i].pos, sizeof(Coord) * L);
			//}

			//Copy_bridges(*(Result + *Nb_solution), Bridges, Nb_bridge);

			(*Nb_solution)++;
			printf("Trouve");
			//printf("\n");
			Print_board(Board, posMax);
			//printf("\n");
			return;
		}

		pos = Find_Island(Board, posMax);


		for (int i = 0; i < 4; i++) {
			Direction_available[i] = Peek_island_number(Board, posMax, pos, i, Length_next_island(Board, posMax, pos, i));
		}

		int Nb_combinaison = Enumeration(Board, pos, posMax, result, &Direction_available);

		if (Nb_combinaison == 0 && atoi(Board + (pos.y * posMax.x) + pos.x)) { return; }


		for (int y = 0; y < Nb_combinaison; y++) {
			if (Nb_combinaison == 1) {
				Solver(Result, Board, posMax, pos, result + (4 * y), Nb_solution, Nb_bridge_max, Nb_bridge, Bridges);
				if (Bridges != NULL && Nb_bridge == 0) {
					for (int e = 0; e < *Nb_bridge_max; e++) {
						if ((*Bridges)[e].pos != NULL) {
							(*Bridges)[e].pos;
							free((*Bridges)[e].pos);
						}

					}
					//free(Bridges[0].pos);
					free(*Bridges);
				}
			}
			else {
				char* Board_copy = (char*)malloc(strlen(Board) * sizeof(char));
				Bridge* Bridge_copy = (Bridge*)malloc((Nb_bridge) * sizeof(Bridge));

				if (Board_copy != NULL && Bridge_copy != NULL) {
					strncpy_s(Board_copy, strlen(Board), Board, _TRUNCATE);
					//Copy_board(Board_copy, Board, posMax.x * posMax.y);
					Copy_bridges(Bridge_copy, *Bridges, Nb_bridge);
				}
				Print_board(Board, posMax);
				Solver(Result, Board_copy, posMax, pos, result + (4 * y), Nb_solution, Nb_bridge_max, Nb_bridge, Bridge_copy);


				free(Board_copy);

				if (Nb_bridge) {
					for (int e = 0; e < Nb_bridge; e++) {
						free(Bridge_copy[e].pos);
					}
					free(Bridge_copy);
				}
			}
		}
		free(result);
		return;
	}
}

Peek_island_number(char* Board, Coord posMax, Coord pos, int Direction, int Length) {

	switch (Direction) {

	case(0):
		atoi((Board + (posMax.x * (pos.y - (Length + 1)) + pos.x)));
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


