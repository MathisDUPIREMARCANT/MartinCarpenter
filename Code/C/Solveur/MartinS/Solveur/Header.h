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

int Is_not_island(char* Board, Coord pos, Coord posMax);
int Island_in_a_direction(char* Board, Coord pos, Coord posMax, int Direction);
void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge);


Coord* Next_Coord(Coord* pos, int direction);
