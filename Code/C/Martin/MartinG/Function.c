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
    int u = (int)((double)rand() / ((double)RAND_MAX + 1) * ((double)max+1 - (double)min)) + min;
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
        Next_Coord(&pos, 0);
        while (pos.y > 0 && *(Board + (posMax.x * (pos.y)) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 0);
        }
        Next_Coord(&pos, 2); 
        break;

    case(1):
        Next_Coord(&pos, 1);
        while (pos.x < posMax.x && *(Board + (posMax.x * pos.y) + pos.x)== '*') {
            space++;
            Next_Coord(&pos, 1);
        }
        Next_Coord(&pos, 3);
        break;

    case(2):
        Next_Coord(&pos, 2);
        while (pos.y < posMax.y && *(Board + (posMax.x * pos.y) + pos.x) == '*') {
            space++;
            Next_Coord(&pos, 2);
        }
        Next_Coord(&pos, 0);
        break;
        
    case(3):
        Next_Coord(&pos, 3);
        while (pos.x > 0 && *(Board + (posMax.x * pos.y) + pos.x) == '*' ) {
            space++;
            Next_Coord(&pos, 3);
        }
        Next_Coord(&pos, 1);
        break;
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

int Ramification(char* Board, Coord pos, Coord posMax, int Direction, int Nb_island, int length, int Islands, int* Type_bridge_ramification, int* Type_island_ramification) {
    int Type_bridgebis = Random(0, 1);

    Place_island_on_map(Board, posMax, pos, Islands + Type_bridgebis + 1);
    for (int i = 0; i < length; i++) {
        Next_Coord(&pos, Direction);
        Place_bridge_on_map(Board, posMax, pos, Type_bridgebis);
    }
    Next_Coord(&pos, Direction);
    Place_island_on_map(Board, posMax, pos, Type_bridgebis + 1);

    *Type_bridge_ramification = Type_bridgebis;
    *Type_island_ramification = Type_bridgebis+1;

    return (Nb_island - 1);
}

void Free_game(Bridge* bridge, Island* island) {
    free(island);
    free(bridge);
}

int No_valid_direction(int* tab, int length) {

    for (int i = 0; i < length; i++) {
        if (tab[i]) { return 0; }
    }
    return 1;
}
