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

int* Space_next_bridge(char* Board, Coord pos, Coord posMax){
    /*Returns a list of spaces available between position x,y and each side
    In the order (N,E,S,O)*/
    int space[4];
    space[0] = 0;
    space[1] = 0;
    space[2] = 0;
    space[3] = 0;

    int xcopy = pos.x;
    int ycopy = pos.y;

    while(pos.y>0 && *(Board + posMax.x*pos.y + pos.x) == '*'){
        space[0] ++;
        Next_Coord(&pos, 0);
    }

    pos.x = xcopy;
    pos.y = ycopy;

    while(pos.x < posMax.x && *(Board + posMax.x * pos.y + pos.x) == '*'){
        space[1] ++;
        Next_Coord(&pos, 1);
    }

    pos.x = xcopy;
    pos.y = ycopy;

    while(pos.y < posMax.y && *(Board + posMax.x * pos.y + pos.x) == '*'){
        space[2] ++;
        Next_Coord(&pos, 2);
    }

    pos.x = xcopy;
    pos.y = ycopy;

    while(pos.x>0 && *(Board + posMax.x * pos.y + pos.x) == '*'){
        space[3] ++;
        Next_Coord(&pos, 3);
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

void Print_board(char* Board, Coord Taille) {
    int i = 0;
    for (i; i < (Taille.x * Taille.y); i++) {
        if (i % Taille.x == 0) {
            printf("\n");
        }
        printf("%c", Board[i]);
    }
}
