#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

void from_C_to_Json_ile(Island ile) {
    printf("		{\"links\" : %d,			\"Placement\" : [%d, %d]		}", ile.number, ile.pos.x, ile.pos.y);
    
}
void from_C_to_Json_pont(Bridge pont) {
	//Coord* coordPtr = &pont.pos;
	
	printf("		{ 		\"width\" : %d, 		\"length\" : %d, 		\"direction\" : %d,		 \"Placement\" : [", pont.size, pont.length, pont.direction);
	for (int i = 0; i < pont.length; i++) {
		printf("[%d, %d]", pont.pos[i].x, pont.pos[i].y);
	}
	printf("] 	}");
}

void from_C_to_Json(Bridge* liste_pont, Island* liste_ile, int nb_pont, int nb_ile, Coord posMax) {
	printf("{");
	printf("	\"Islands\" : [");
	for (int i = 0; i < nb_ile; i++) {
		from_C_to_Json_ile(liste_ile[i]);
		if (i < nb_ile - 1) {
			printf(",");
		} 
	}
	printf("    ],");
	printf("    \"Grid\": [		{			\"size\" : [%d, %d]		} ", posMax.x, posMax.y);
	printf("    ],");
	printf("    \"Bridges\" : [");
	for (int i = 0; i < nb_pont; i++) {
		from_C_to_Json_pont(liste_pont[i]);
		if (i < nb_pont - 1) {
			printf(",");
		}
	}
	printf("    ]");
	printf("}");
	
	
}
