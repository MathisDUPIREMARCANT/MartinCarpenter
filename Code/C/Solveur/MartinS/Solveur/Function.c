#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

#define Nb_max 100

void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge, int Direction) {
    /*Place a bridge on the board in (x,y)*/

    if (Direction % 2) {
        if (type_bridge == 0) {
            *(Board + posMax.x * pos.y + pos.x) = '~';
        }

        if (type_bridge == 1) {
            *(Board + posMax.x * pos.y + pos.x) = '-';
        }

    }
    else {
        if (type_bridge == 0) {
            *(Board + posMax.x * pos.y + pos.x) = '_';
        }

        if (type_bridge == 1) {
            *(Board + posMax.x * pos.y + pos.x) = '.';
        }
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
    if (*(Board + (posMax.x * (pos.y)) + pos.x) != '*' && *(Board + (posMax.x * (pos.y)) + pos.x) != '~' && *(Board + (posMax.x * (pos.y)) + pos.x) != '-') {
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

    for (int y = 0; y < posMax.y; y++) {
        for (int x = 0; x < posMax.x; x++) {
            if (!(*(Board + (posMax.x * y) + x) == '*' || *(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '-' || *(Board + (posMax.x * y) + x) == '_' || *(Board + (posMax.x * y) + x) == '.' || *(Board + (posMax.x * y) + x) == '0')) {
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


Coord Find_Island(char* Board, Coord posMax) {
    Coord pos = { 0, 0 };
    for (int y = 0; y < posMax.y; y++) {
        for (int x = 0; x < posMax.x; x++) {
            if (!(*(Board + (posMax.x * y) + x) == '*' || *(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '-' || *(Board + (posMax.x * y) + x) == '_' || *(Board + (posMax.x * y) + x) == '.' || *(Board + (posMax.x * y) + x) == '0')) {
                pos.x = x;
                pos.y = y;
                x = posMax.x;
                y = posMax.y;
            }
        }
    }
    return pos;
}

void Print_board(char* Save, char* Board, Coord Taille) {
    int i = 0;
    for (i; i < (Taille.x * Taille.y); i++) {
        if (i % Taille.x == 0) {
            //printf("\n");
        }

        if (Board[i] == '0') {
            printf("%c", Save[i]);
        }
        else {
            printf("%c", Board[i]);
        }

    }
    //printf("\n");
}

void Create_bridge(char* Board, Coord posMax, Coord* pos, int Length, int Direction, int Type_bridge) {
    for (int i = 0; i < Length; i++) {
        Next_Coord(pos, Direction);
        Place_bridge_on_map(Board, posMax, *pos, Type_bridge, Direction);
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


int Enumeration(char* board, Coord pos, Coord posMax, int* result, int* direction) {
    int weight_island = atoi((board + (posMax.x * pos.y) + pos.x));
    int Nb_possibility = 0;
    for (int i = 0; i < 3; i++) {
        for (int j = 0; j < 3; j++) {
            for (int k = 0; k < 3; k++) {
                for (int l = 0; l < 3; l++) {
                    i;
                    j;
                    k;
                    l;

                    if (i <= direction[0] && j <= direction[1] && k <= direction[2] && l <= direction[3] && (i + j + k + l) == weight_island) {
                        *(result + (Nb_possibility * 4) + 0) = i;
                        *(result + (Nb_possibility * 4) + 1) = j;
                        *(result + (Nb_possibility * 4) + 2) = k;
                        *(result + (Nb_possibility * 4) + 3) = l;
                        Nb_possibility++;

                        //int* buffer = realloc(result, sizeof(int) * (Nb_possibility + 1) * 4);
                        //if (buffer != NULL) {
                         //   free(result);
                          //  result = buffer; 
                        //}

                    }

                }
            }
        }
    }
    return Nb_possibility;
}

void Copy_board(char* destination, char* source, int count) {
    for (int i = 0; i < count; i++) {
        destination[i] = source[i];
    }
}

void Solver(char* Save, char* Board, Coord posMax, Coord pos, int* Direction, int Nb_bridge) {

    int Direction_available[4];
    int* result = malloc(sizeof(int) * 4 * 81);



    if (result != NULL) {

        if (Direction != NULL) {

            Coord Copy_pos;
            int Type_island = 0;

            for (int i = 0; i < 4; i++) {
                Copy_pos.x = pos.x;
                Copy_pos.y = pos.y;

                if (Direction[i]) {
                    int Length;
                    Type_island += Direction[i];

                    Length = Length_next_island(Board, posMax, pos, i);

                    Create_bridge(Board, posMax, &Copy_pos, Length, i, Direction[i] - 1);

                    Nb_bridge++;

                    Next_Coord(&Copy_pos, i);

                    if ((atoi(Board + (Copy_pos.y * posMax.x) + Copy_pos.x) - Direction[i]) < 0) { return; }

                    Place_island_on_map(Board, posMax, Copy_pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Direction[i]);



                    // if Peek_island_number(Board, posMax, Copy_pos, i, 0) - Direction[i] < 0 alors on casse la recursivite
                }
            }

            Place_island_on_map(Board, posMax, pos, atoi(Board + (posMax.x * Copy_pos.y) + Copy_pos.x) - Type_island);
        }

        int Nb_islands = Island_on_map(Board, pos, posMax);

        if (Nb_islands == 0) {
            Print_board(Save, Board, posMax);
            printf(" ");
            printf("%d ", Nb_bridge);
            return;
        }

        pos = Find_Island(Board, posMax);


        for (int i = 0; i < 4; i++) {
            int Space = Length_next_island(Board, posMax, pos, i);

            if (Space) {
                Direction_available[i] = Peek_island_number(Board, posMax, pos, i, Space);
            }
            else {
                Direction_available[i] = 0;
            }
        }

        int Nb_combinaison = Enumeration(Board, pos, posMax, result, &Direction_available);

        if (Nb_combinaison == 0 && atoi(Board + (pos.y * posMax.x) + pos.x)) { return; }


        for (int y = 0; y < Nb_combinaison; y++) {
            char* Board_copy = (char*)malloc((strlen(Board) + 1) * sizeof(char));

            if (Board_copy != NULL) {
                Copy_board(Board_copy, Board, (posMax.x * posMax.y) + 1);
            }
            Solver(Save, Board_copy, posMax, pos, result + (4 * y), Nb_bridge);
        }
        free(result);
        return;
    }
}

Peek_island_number(char* Board, Coord posMax, Coord pos, int Direction, int Length) {

    switch (Direction) {

    case(0):
        return atoi((Board + (posMax.x * (pos.y - (Length + 1)) + pos.x)));
        break;

    case(1):
        return atoi((Board + (posMax.x * (pos.y) + pos.x + Length + 1)));
        break;

    case(2):
        return atoi((Board + (posMax.x * (pos.y + (Length + 1)) + pos.x)));
        break;

    case(3):
        return atoi((Board + (posMax.x * (pos.y) + pos.x - (Length + 1))));
        break;
    }
}

void Stock_island(Island* islands, Coord posMax, char* board) {
    int incr = 0;
    for (int i = 0; i < posMax.x; i++) {
        for (int j = 0; j < posMax.y; j++) {
            if (*(board + (posMax.x * j) + i) != '*' && *(board + (posMax.x * j) + i) != '~' && *(board + (posMax.x * j) + i) != '#') {
                islands[incr].pos.x = i;
                islands[incr].pos.y = j;
                islands[incr].number = atoi(board + (posMax.x * j) + i);
                incr++;

            }
        }
    }
}

