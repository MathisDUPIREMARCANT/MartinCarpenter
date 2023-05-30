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

void Next_Coord(Coord* pos, int direction) {
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

int Weigth_Island_in_a_direction(char* Board, Coord pos, Coord posMax, int Direction) {
    int Island = 0;
    switch (Direction) {
    case(0):
        Next_Coord(&pos, 0);
        while (pos.y > 0) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island = *(Board + (posMax.x * (pos.y)) + pos.x);
                pos.y = 0;
            }
            Next_Coord(&pos, 0);
        }
        break;

    case(1):
        Next_Coord(&pos, 1);
        while (pos.x < posMax.x) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island = *(Board + (posMax.x * (pos.y)) + pos.x);
                pos.x = posMax.x;
            }
            Next_Coord(&pos, 1);
        }
        break;

    case(2):
        Next_Coord(&pos, 2);
        while (pos.y < posMax.y) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island = *(Board + (posMax.x * (pos.y)) + pos.x);
                pos.y = posMax.y;
            }
            Next_Coord(&pos, 2);
        }
        break;

    case(3):
        Next_Coord(&pos, 3);
        while (pos.x > 0) {
            if (Is_not_Island(Board, pos, posMax)) {
                Island = *(Board + (posMax.x * (pos.y)) + pos.x);
                pos.x = 0;
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

void Print_board(char* Board, Coord Taille) {
    int i = 0;
    for (i; i < (Taille.x * Taille.y); i++) {
        if (i % Taille.x == 0) {
            printf("\n");
        }
        printf("%c", Board[i]);
    }
}

void Create_bridge(char* Board, Coord posMax, Coord* pos, int Length, int Direction, int Type_bridge) {
    for (int i = 0; i < Length; i++) {
        Next_Coord(pos, Direction);
        Place_bridge_on_map(Board, posMax, *pos, Type_bridge);
    }
}

int Length_next_island(char* Board, Coord posMax, Coord pos, int Direction) {
    int space = 0;
    switch (Direction) {

    case(0):
        Next_Coord(&pos, 0);
        while (pos.y > 0 && *(Board + (posMax.x * (pos.y)) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 0);
        }
        break;

    case(1):
        Next_Coord(&pos, 1);
        while (pos.x < posMax.x && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 1);
        }
        break;

    case(2):
        Next_Coord(&pos, 2);
        while (pos.y < posMax.y && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 2);
        }
        break;

    case(3):
        Next_Coord(&pos, 3);
        while (pos.x > 0 && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 3);
        }
        break;
    }

    return  space;
}


int Enumeration(char* board, Coord pos, Coord posMax, int* result, int direction[], int number_island) {
    int weight_island = *(board + (posMax.x * pos.y) + pos.x);
    int weight_top = Weigth_Island_in_a_direction(board, pos, posMax, 0);
    int weight_right = Weigth_Island_in_a_direction(board, pos, posMax, 1);
    int weight_south = Weigth_Island_in_a_direction(board, pos, posMax, 2);
    int weight_west = Weigth_Island_in_a_direction(board, pos, posMax, 3);
    int Nb_possibility = 0 ;
    for (int i = 0; i < 3; i++) {
        for (int j = 0; j < 3; j++) {
            for (int k = 0; k < 3; k++) {
                for (int l = 0; l < 3; l++) {
                    if (i <= weight_top && j <= weight_right && k <= weight_south && l <= weight_west && (i + j + k + l) <= weight_island) {
                        *(result + (Nb_possibility * 4) + 0) = i;
                        *(result + (Nb_possibility * 4) + 1) = j;
                        *(result + (Nb_possibility * 4) + 2) = k;
                        *(result + (Nb_possibility * 4) + 3) = l;
                        Nb_possibility++;
                        realloc(result, sizeof(int) * Nb_possibility * 4);
                        
                    }
                    
                }
            } 
        }
    }

}

