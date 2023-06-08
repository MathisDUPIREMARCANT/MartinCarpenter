#pragma once

typedef struct coord {
    int x;
    int y;
}Coord;

typedef struct bridge {
    int size;
    int length;
    Coord* pos;
    int direction;
}Bridge;

typedef struct island {
    Coord pos;
    int number;
}Island;

Coord Find_Bridge(char* Board, Coord posMax);

int Island_on_map(char* Board, Coord pos, Coord posMax);

void From_C_to_Json(Bridge* Bridges, Island* Islands, int Nb_bridge, int Nb_island, Coord posMax, int Nb_solution);
void From_C_to_Json_bridge(Bridge bridge);
void From_C_to_Json_island(Island island);
void Next_Coord(Coord* pos, int direction);
void Print_board(char* Board, Coord Taille);
void Stock_bridge(Bridge* Bridges, Coord posMax, char* board, int Nb_bridge_max);
void Stock_island(Island* islands, Coord posMax, char* board);

void From_C_to_Json_bridge_null(Bridge bridge);

void Test(Bridge* Bridges, int Nb);