#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

#define Nb_max 100

void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge) {
    /*Place a bridge on the board in (x,y)*/

    if (type_bridge == 0) {
        *(Board + posMax.x * pos.y + pos.x) = '~';
    }

    if (type_bridge == 1) {
        *(Board + posMax.x * pos.y + pos.x) = '#';
    }
};

void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight) {
    /*Place a bridge on the board in (x,y)*/
    *(Board + posMax.x * pos.y + pos.x) = weight + '0';
};

Coord* Next_Coord(Coord* pos, int direction) {
    /*Modifies the coordinates according to the argument passed as a parameter
    (0:N, 1:E, 2:S, 3:O)*/
    switch (direction) {
    case 0:
        //N
        //pos->x = pos->x;
        pos->y -= 1;
        break;
    case 1:
        //E
        pos->x += 1;
        //pos->y = pos->y;

        break;
    case 2:
        //S
        //pos->x = pos->x;
        pos->y += 1;
        break;
    case 3:
        //O
        pos->x -= 1;
        //pos->y = pos->y;
        break;
    }
}

int Is_not_Island(char* Board, Coord pos, Coord posMax) {
    if (*(Board + (posMax.x * (pos.y)) + pos.x) != '*' && *(Board + (posMax.x * (pos.y)) + pos.x) != '~' && *(Board + (posMax.x * (pos.y)) + pos.x) != '#') {
        return 1;
    }
    return 0;
}

int Island_in_a_direction(char* Board, Coord pos, Coord posMax, int Direction) {
    int Island = 0;
    switch (Direction) {
    case(0):
        Next_Coord(&pos, 0);
        while (pos.y > 0) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island++;
            }
            Next_Coord(&pos, 0);
        }
        break;

    case(1):
        Next_Coord(&pos, 1);
        while (pos.x < posMax.x) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island++;
            }
            Next_Coord(&pos, 1);
        }
        break;

    case(2):
        Next_Coord(&pos, 2);
        while (pos.y < posMax.y) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island++;
            }
            Next_Coord(&pos, 2);
        }
        break;

    case(3):
        Next_Coord(&pos, 3);
        while (pos.x > 0) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island++;
            }
            Next_Coord(&pos, 3);
        }
        break;
    }
    return Island;
}


int Island_on_map(char* Board, Coord pos, Coord posMax) {
    
    int Island_current = 0;

    for (int x = 0; x < posMax.x ; x++) {
        for (int y = 0; y < posMax.y ; y++) {
            if (!(*(Board + (posMax.x * y) + x) == '*' || *(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '#')) {
                Island_current++;
            }
        }
    }

    return Island_current;
};

int Random(int min, int max) {
    /*Returns a random number between minimum and maximum*/
    int u = (int)((double)rand() / ((double)RAND_MAX + 1) * ((double)max + 1 - (double)min)) + min;
    return(u);
}

int Verif_solved(char* Board, int Nb_Island, Coord posMax) {
    int incr = 0;
    for (int x = 0; x < posMax.x; x++) {
        for (int y = 0; y < posMax.y; y++) {
            if (*(Board + (posMax.x * y) + x) == 0) {
                incr++;
            }
        }
    }
    if (incr == Nb_Island) {
        return 1;
    }
    return 0;
};


int Bridge_mandatory(char* Board, Coord pos, Coord posMax, int dir, int* Type_bridge) {
    Coord pos_copy = pos;
    Next_Coord(&pos_copy, dir);
    while (Is_not_Island(Board, pos_copy, posMax)) {
        Next_Coord(&pos_copy, dir);
    }
    Next_Coord(&pos_copy, dir);
    int cmp = 0;
    for (int j = 0;j < 4;j++) {
        if (Island_in_a_direction(Board, pos_copy, posMax, j) >= 1) {
            cmp++;
        }
    }
    if (cmp == 1) {
        *Type_bridge = *(Board + (posMax.x * pos_copy.y) + pos_copy.x) - 1;
        return 1;
    }
    return 0;
}


Coord Find_Island(char* Board, Coord posMax) {
    Coord pos;
    for (int x = 0; x < posMax.x; x++) {
        for (int y = 0; y < posMax.y; y++) {
            if (!(*(Board + (posMax.x * y) + x) == '*' || *(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '#')) {
                pos.x = x;
                pos.y = y;
                x = posMax.x;
                y = posMax.y;
            }
        }
    }
    return pos;
}


