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
		printf("%d", *(coordPtr + i));
	}
	printf("] \n }");
}

void from_C_to_Json(Bridge* liste_pont, Island* liste_ile, int nb_pont, int nb_ile, int taille[]) {
	printf("{\n");
	printf("    \"Island\" : [\n");
	for (int i = 0; i < nb_ile; i++) {
		from_C_to_Json_ile(liste_ile[i]);
		if (i < nb_ile - 1) {
			printf(",\n");
		}
	}
	printf("    ],\n");
	printf("    \"Grid\": [\n { \"size\" : [%d, %d] ", taille[0], taille[1]);
	printf("    ]\n");
	printf("    \"Bridge\" : [\n");
	for (int i = 0; i < nb_pont; i++) {
		from_C_to_Json_pont(liste_pont[i]);
		if (i < nb_pont - 1) {
			printf(",\n");
		}
	}
	printf("    ]\n");
	printf("}\n");
}
