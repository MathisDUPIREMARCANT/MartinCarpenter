#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

void from_C_to_Json_island(Island island) {
    printf("		{\"links\" : %d,			\"Placement\" : [%d, %d]		}", island.number, island.pos.x, island.pos.y);
    
}
void from_C_to_Json_bridge(Bridge bridge) {
	
	
	printf("		{ 		\"width\" : %d, 		\"length\" : %d, 		\"direction\" : %d,		 \"Placement\" : [", bridge.size, bridge.length, bridge.direction);
	for (int i = 0; i < bridge.length; i++) {
		printf("[%d, %d]", bridge.pos[i].x, bridge.pos[i].y);
	}
	printf("] 	}");
}

void from_C_to_Json(Bridge* Bridges, Island* Islands, int Nb_bridge, int Nb_island, Coord posMax) {
	printf("{");
	printf("	\"Islands\" : [");
	for (int i = 0; i < Nb_island; i++) {
		from_C_to_Json_island(Islands[i]);
		if (i < Nb_island - 1) {
			printf(",");
		} 
	}
	printf("    ],");
	printf("    \"Grid\": [		{			\"size\" : [%d, %d]		} ", posMax.x, posMax.y);
	printf("    ],");
	printf("    \"Bridges\" : [");
	for (int i = 0; i < Nb_bridge; i++) {
		from_C_to_Json_bridge(Bridges[i]);
		if (i < Nb_bridge - 1) {
			printf(",");
		}
	}
	printf("    ]");
	printf("}");
	
	
}
