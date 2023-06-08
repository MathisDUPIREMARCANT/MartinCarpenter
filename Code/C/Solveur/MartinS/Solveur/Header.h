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


int Enumeration(char* board, Coord pos, Coord posMax, int* result, int* direction);
int Is_not_Island(char* Board, Coord pos, Coord posMax);
int Weigth_Island_in_a_direction(char* Board, Coord pos, Coord posMax, int Direction);
int Island_on_map(char* Board, Coord pos, Coord posMax);
int Length_next_island(char* Board, Coord posMax, Coord pos, int Direction);
int Peek_island_number(char* Board, Coord posMax, Coord pos, int Direction, int Length);

void Create_bridge(char* Board, Coord posMax, Coord* pos, int Length, int Direction, int Type_bridge);
void Next_Coord(Coord* pos, int direction);
void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge, int Direction);
void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight);
void Print_board(char* Save, char* Board, Coord Taille);
void Stock_island(Island* islands, Coord posMax, char* board);
void Solver(char* Save, char* Board, Coord posMax, Coord pos, int* Direction, int Nb_bridge);

Coord Find_Island(char* Board, Coord posMax);

int Random(int min, int max);


