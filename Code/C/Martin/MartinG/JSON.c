#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

void From_C_to_Json_island(Island island) {
    printf("		{\"links\" : %d,			\"Placement\" : [%d, %d]		}", island.number, island.pos.y, island.pos.x);
    
}
void From_C_to_Json_bridge(Bridge bridge) {
	
	
	printf("		{ 		\"width\" : %d, 		\"length\" : %d, 		\"direction\" : %d,		 \"Placement\" : [", bridge.size, bridge.length, bridge.direction);
	for (int i = 0; i < bridge.length; i++) {
		if (i < bridge.length - 1) {
			printf("[%d, %d],", bridge.pos[i].y, bridge.pos[i].x);
		}
		else {
			printf("[%d, %d]", bridge.pos[i].y, bridge.pos[i].x);
		}
	}
	printf("] 	}");
}

void From_C_to_Json(Bridge* Bridges, Island* Islands, int Nb_bridge, int Nb_island, Coord posMax) {
	printf("{");
	printf("	\"Islands\" : [");
	for (int i = 0; i < Nb_island; i++) {
		From_C_to_Json_island(Islands[i]);
		if (i < Nb_island - 1) {
			printf(",");
		} 
	}
	printf("    ],");
	printf("    \"Grid\": [		{			\"size\" : [%d, %d]		} ", posMax.x, posMax.y);
	printf("    ],");
	printf("    \"Bridges\" : [");
	for (int i = 0; i < Nb_bridge; i++) {
		From_C_to_Json_bridge(Bridges[i]);

		free(Bridges[i].pos); //free positions

		if (i < Nb_bridge - 1) {
			printf(",");
		}
	}
	printf("    ],");
	printf("    \"PlacedBridges\":{}");
	printf("}");

	
	
}
