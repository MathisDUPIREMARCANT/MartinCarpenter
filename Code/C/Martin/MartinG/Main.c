#include <stdio.h>
#include <stdlib.h>
#include "Header.h"
void from_C_to_Json_ile(Island ile) {
	printf("Placement:[%d,%d], links: %d", ile.pos.x, ile.pos.y, ile.number);
}

void from_C_to_Json_pont(Bridge pont) {
	printf("width: %d, length: %d, coord: %d, %d, direction: %d", pont.size, pont.lenght, pont.pos.x, pont.pos.y, pont.direction);
}

void from_C_to_Json(Bridge* liste_pont, Island* liste_ile, int nb_pont, int nb_ile, int taille[]) {
	printf("{\n");
	printf("    \"Island\": [\n");
	for (int i = 0; i < nb_ile; i++) {
		from_C_to_Json_ile(liste_ile[i]);
		if (i < nb_ile - 1) {
			printf(",\n");
		}
	}
	printf("],\n");
	printf("    \"Grid\": [\n { \"size\": [%d, %d] }\n", taille[0], taille[1]);
	printf("    ],\n");
	printf("    \"Bridge\": [\n");
	for (int i = 0; i < nb_pont; i++) {
		from_C_to_Json_pont(liste_pont[i]);
		if (i < nb_pont - 1) {
			printf(",\n");
		}
	}
	printf("    ]\n");
	printf("}\n");
}



void main(int argc, char* argv[]) {
	//int nombre_iles = *(argv[0]);

	/*Coord posMax;
	Coord pos; Coord pos2;

	posMax.x = 5;//*(argv[1]);
	posMax.y = 6;//*(argv[2]);
	

	pos.x = 2; pos.y = 3;
	pos2.x = 4; pos2.y = 5;
	char* Board = Init_board_Game(posMax);
	//Map_mading(Board, posMax, pos, nombre_iles);
	Print_board(Board, posMax);

	Place_bridge_on_map(Board, posMax, pos, 2);
	Place_island_on_map(Board, posMax, pos2, 2);
	printf("\n");

	Print_board(Board, posMax);*/

	Bridge* bridge1 = (Bridge*)malloc(sizeof(Bridge));
	Island* island1 = (Island*)malloc(sizeof(Island));
	if (bridge1) {
		bridge1->direction = 1;
		bridge1->lenght = 2;
		bridge1->pos.x = 1;
		bridge1->pos.y = 2;
		bridge1->size = 1;
	}
	if (island1) {
		island1->pos.x = 2;
		island1->pos.y = 1;
		island1->number = 2;
	}
	int taille[2] = { 6, 7 };

	

	from_C_to_Json(bridge1, island1, 1, 1, taille);

	free(bridge1);
	free(island1);

	return 0;
}