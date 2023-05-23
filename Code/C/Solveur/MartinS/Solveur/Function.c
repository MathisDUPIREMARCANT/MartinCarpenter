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


Island Island_on_map(char* Board, Coord pos, Coord posMax) {
    Island* Islands;
    int Island_current = 0;

    Islands = (Island*)malloc(Nb_max * sizeof(Island));

    for (int i = 0; i < posMax.x ; i++) {
        for (int j = 0; j < posMax.y ; i++) {
            if (*(Board + (posMax.x * j) + i) != '*' && *(Board + (posMax.x * j) + i) != '~' && *(Board + (posMax.x * j) + i) != '#') {
                Islands[Island_current].pos.x = i;
                Islands[Island_current].pos.y = j;
                Islands[Island_current].number = *(Board + (posMax.x * j) + i);
                Island_current++;
            }
        }
        
    }

    for (int i = 0; i < Island_current; i++) {
        int Direction = 0;

    }



};



