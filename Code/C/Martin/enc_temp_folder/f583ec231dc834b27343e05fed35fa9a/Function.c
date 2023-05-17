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

int Random(int min,int max) {
    /*Returns a random number between minimum and maximum*/
    int u = (int)((double)rand() / ((double)RAND_MAX + 1) * ((double)max - (double)min)) + min;
    return(u);
}
    


void Place_bridge_on_map(char* Board, Coord posMax, Coord pos, int type_bridge){
    /*Place a bridge on the board in (x,y)*/

    if(type_bridge == 0){
        *(Board + posMax.x * pos.y + pos.x) = '~';
    }
   
    if(type_bridge == 1){
        *(Board + posMax.x * pos.y + pos.x) = '#';
    }
};

void Place_island_on_map(char* Board, Coord posMax, Coord pos, int weight) {
    /*Place a bridge on the board in (x,y)*/
    *(Board + posMax.x * pos.y + pos.x) = weight + '0';
};

int Space_next_bridge(char* Board, Coord pos, Coord posMax, int Direction){
    /*Returns a list of spaces available between position x,y and each side
    In the order (N,E,S,O)*/
    int space = 0;
    switch (Direction) {

    case(0):
        while (pos.y-1 > 0 && *(Board + (posMax.x * (pos.y-1)) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 0);
        }break;

    case(1):
        while (pos.x+1 < posMax.x-1 && *(Board + (posMax.x * pos.y) + pos.x+1)== '*') {
            space++;
            Next_Coord(&pos, 1);
        }break;

    case(2):
        while (pos.y+1 < posMax.y-1 && *(Board + (posMax.x * (pos.y+1)) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 2);
        }break;
        
    case(3):
        while (pos.x-1 > 0 && *(Board + (posMax.x * pos.y) + pos.x-1) == '*' ) {
            space++;
            Next_Coord(&pos, 3);
        }break;
    }

    return  space;
}

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

void Print_board(char* Board, Coord Taille) {
    int i = 0;
    for (i; i < (Taille.x * Taille.y); i++) {
        if (i % Taille.x == 0) {
            printf("\n");
        }
        printf("%c", Board[i]);
    }
}

int* Table_copy(int* table, int length) {
    int* pt;
    pt = (int*)malloc(4 * sizeof(int));
    for (int i = 0; i < length; i++) {
        pt[i] = table[i];
    }
    return pt;
}
