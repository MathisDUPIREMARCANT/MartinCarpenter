#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>


char* Init_board_Game(Coord pos){
    /*Initialize the board and fill it with '*' 
    Returns the pointer of the Board*/
    
    char* Board = NULL;
    Board = (char*)malloc(((pos.x * pos.y)+1) * sizeof(char));
    if (Board != NULL) {
        for (int x = 0; x < pos.x; x++) {
            for (int y = 0; y < pos.y; y++) {
                *(Board + (pos.x * y) + x) =  '*';
            }
        }
    }
    return Board;
}

int Random(int maximum) {
    /*Returns a random number between 0 and maximum*/

    srand(time(0));
    return rand() % (maximum + 1);
}

void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge){
    /*Place a bridge on the board in (x,y)*/

    if(type_bridge == 1){
        *(Board + posMax.x*pos.y + pos.x) = '~';
    }
   
    if(type_bridge == 2){
        *(Board + posMax.x *pos.y + pos.x) = '#';
    }
};

void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight) {
    /*Place a bridge on the board in (x,y)*/
    *(Board + posMax.x * pos.y + pos.x) = weight + '0';
};

int Space_next_bridge(char* Board, Coord pos, Coord posMax){
    /*Returns a list of spaces available between position x,y and each side
    In the order (N,E,S,O)*/
    int N = 0; int E = 0;
    int S = 0; int O = 0;
    int xcopy = pos.x;
    int ycopy = pos.y;

    while(pos.y>0 && strcmp(*(Board + posMax.y*pos.x + pos.y), '*')){
        N += 1;
        pos.y -= 1;
    }

    pos.x = xcopy;
    pos.y = ycopy;

    while(pos.x < posMax.x && strcmp(*(Board + posMax.y * pos.x + pos.y), '*')){
        E += 1;
        pos.x += 1;
    }

    pos.x = xcopy;
    pos.y = ycopy;

    while(pos.y < posMax.y && strcmp(*(Board + posMax.y * pos.x + pos.y), '*')){
        S += 1;
        pos.y += 1;
    }

    pos.x = xcopy;
    pos.y = ycopy;

    while(pos.x>0 && strcmp(*(Board + posMax.y * pos.x + pos.y), '*')){
        O += 1;
        pos.x -= 1;
    }

    int space[4];
    space[0] = N;
    space[1] = E;
    space[2] = S;
    space[3] = O;

    return  space;
}

Coord* Next_Coord(Coord* pos, int direction) {
    switch (direction) {
    case 0:
        //N
        //pos->x = pos->x;
        pos->y += 1;
        break;
    case 1:
        //E
        pos->x += 1;
        //pos->y = pos->y;
        
        break;
    case 2:
        //S
        //pos->x = pos->x;
        pos->y -= 1;
        break;
    case 3:
        //O
        pos->x -= 1;
        //pos->y = pos->y;
        break;
    }
}

int Map_mading(char* Board, Coord posMax, Coord pos, int Nb_ile) {
    *(Board + (posMax.y*pos.x) + pos.y) = '1';
    int end = 0; int Type_bridge = Random(1)+1; int Type_bridge_precedent = 1; int Direction_available[4];int a = 1;
    while (end < Nb_ile) {
        int* tab = Space_next_bridge(Board, pos, posMax);
        for (int i = 0; i < 4; i++) {
            if (*(tab + i) >= 2) {
                Direction_available[i] = 1;
            }
            else {
                Direction_available[i] = 0;
            }
        }
        int D_pont;
        while(a){
            D_pont = Random(3);
            if (Direction_available[D_pont] == 1) {
                a = 0;
            }
        }
        
        int length = Random(tab[D_pont]);
        for (int i = 0; i <= length; i++) {
            Next_Coord(&pos, D_pont);
            Place_bridge_on_map(Board, posMax, pos, Type_bridge);
        }
        
        Next_Coord(&pos, D_pont);
        *(Board + posMax.y*pos.x + pos.y) = Type_bridge + Type_bridge_precedent;
        int Type_bridge = Random(1) + 1;
        Type_bridge_precedent = Type_bridge;
        end++;
    }
}

void Affichage_board(char* Board, Coord Taille) {
    int i = 0;
    for (i; i < (Taille.x * Taille.y); i++) {
        if (i % Taille.x == 0) {
            printf("\n");
        }
        printf("%c", Board[i]);
    }
}
