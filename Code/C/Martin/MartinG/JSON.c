#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

void from_C_to_Json_ile(Island ile) {
	printf("{\"links\" : % d, \"Placement\" : [%d, %d]\n}", ile.pos.x, ile.pos.y, ile.number);

}
void from_C_to_Json_pont(Bridge pont) {
	Coord* coordPtr = &pont.pos;

	printf("{ \n \"width\" : %d, \"lenght\" : %d, \"direction\" : %d, \"Placement\" : [", pont.size, pont.lenght, pont.direction);
	for (int i = 0; i < pont.lenght; i++) {
		printf("[%d, %d]", (coordPtr + i)->x, (coordPtr + i)->y);
	}
	printf("] \n }");
}

void from_C_to_Json(Bridge* liste_pont, Island* liste_ile, int nb_pont, int nb_ile, int taille[]) {
	printf("{\n");
	printf("    \"Islands\" : [\n");
	for (int i = 0; i < nb_ile; i++) {
		from_C_to_Json_ile(liste_ile[i]);
		if (i < nb_ile - 1) {
			printf(",\n");
		}
	}
	printf("    ],\n");
	printf("    \"Grid\": [\n { \"size\" : [%d, %d]} ", taille[0], taille[1]);
	printf("    ],\n");
	printf("    \"Bridges\" : [\n");
	for (int i = 0; i < nb_pont; i++) {
		from_C_to_Json_pont(liste_pont[i]);
		if (i < nb_pont - 1) {
			printf(",\n");
		}
	}
	printf("    ]\n");
	printf("}\n");
}
void main() {
	Bridge* bridge1 = (Bridge*)malloc(sizeof(Bridge));
	Island* island1 = (Island*)malloc(sizeof(Island));
	if (bridge1) {
		bridge1->direction = 1;
		bridge1->lenght = 1;
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
