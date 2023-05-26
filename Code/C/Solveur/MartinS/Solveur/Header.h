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
int Is_not_Island(char* Board, Coord pos, Coord posMax);
int Island_in_a_direction(char* Board, Coord pos, Coord posMax, int Direction);
int Island_on_map(char* Board, Coord pos, Coord posMax);

void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge);
void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight);
void solver(char* Board, Coord posMax, Coord pos, int Direction[4]);

Coord Find_Island(char* Board, Coord posMax);

int Random(int min, int max);
int solveur(char* Board, Coord pos, Coord posMax);
int Verif_solved(char* Board, int Nb_Island, Coord posMax);
Coord* Next_Coord(Coord* pos, int direction);
