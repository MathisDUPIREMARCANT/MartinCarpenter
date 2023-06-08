#include "Header.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <malloc.h>
#include <memory.h>

#define _CRT_SECURE_DEPRECATE_MEMORY

// -*- coding: utf-8 -*-


int main(int argc, char* argv[]) {
    if (argc < 5) {
        printf("Invalid arguments. Usage: program_name <width> <height> <bridge_count> <board>\n");
        return 1;
    }

    int Nb_island;
    int Nb_bridge = atoi(argv[3]);
    Coord pos;
    Coord posMax = { atoi(argv[1]), atoi(argv[2]) };
    char* Board = (char*)malloc(((posMax.x * posMax.y) + 1) * sizeof(char));

    if (Board != NULL) {
        strncpy_s(Board, (posMax.x * posMax.y) + 1, argv[4], (posMax.x * posMax.y) + 1);
    }
    else {
        printf("Error: Memory allocation failed\n");
        return 1;
    }

    pos.x = 0;
    pos.y = 0;

    Nb_island = Island_on_map(Board, pos, posMax);

    Bridge* Bridges = (Bridge*)malloc(sizeof(Bridge) * Nb_bridge);
    Island* Islands = (Island*)malloc(sizeof(Island) * Nb_island);

    if (Bridges == NULL || Islands == NULL) {
        printf("Error: Memory allocation failed\n");
        free(Board);
        free(Bridges);
        free(Islands);
        return 1;
    }

    Stock_island(Islands, posMax, Board);
    Stock_bridge(Bridges, posMax, Board, Nb_bridge);

    From_C_to_Json(Bridges, Islands, Nb_bridge, Nb_island, posMax, 1);

    free(Board);
    free(Bridges);
    free(Islands);

    return 0;
}
