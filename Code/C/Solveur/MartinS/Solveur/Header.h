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


int Bridge_mandatory(char* Board, Coord pos, Coord posMax, int dir, int* Type_bridge);
int Denombrement(char* board, Coord pos, Coord posMax, int* possibilite[]);
int Is_not_Island(char* Board, Coord pos, Coord posMax);
int Weigth_Island_in_a_direction(char* Board, Coord pos, Coord posMax, int Direction);
int Island_on_map(char* Board, Coord pos, Coord posMax);
int Length_next_island(char* Board, Coord posMax, Coord pos, int Direction);
int Peek_island_number(char* Board, Coord posMax, Coord pos, int Direction, int Length);

void Create_bridge(char* Board, Coord posMax, Coord* pos, int Length, int Direction, int Type_bridge);
void From_C_to_Json(Bridge* Bridges, Island* Islands, int Nb_bridge, int Nb_island, Coord posMax);
void From_C_to_Json_bridge(Bridge bridge);
void From_C_to_Json_island(Island island);
void Next_Coord(Coord* pos, int direction);
void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge);
void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight);
void Solver(char** Result, char* Board, Coord posMax, Coord pos, int Direction[4]);

Coord Find_Island(char* Board, Coord posMax);

int Random(int min, int max);
int solveur(char* Board, Coord pos, Coord posMax);
int Verif_solved(char* Board, int Nb_Island, Coord posMax);

