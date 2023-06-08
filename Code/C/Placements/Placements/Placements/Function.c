#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

int Island_on_map(char* Board, Coord pos, Coord posMax) {

    int Island_current = 0;

    for (int y = 0; y < posMax.y; y++) {
        for (int x = 0; x < posMax.x; x++) {
            if (!(*(Board + (posMax.x * y) + x) == '*' || *(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '#' || *(Board + (posMax.x * y) + x) == '0')) {
                Island_current++;
            }
        }
    }

    return Island_current;
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

Coord Find_Bridge(char* Board, Coord posMax) {
    Coord pos = { 0, 0 };
    for (int y = 0; y < posMax.y; y++) {
        for (int x = 0; x < posMax.x; x++) {
            if ((*(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '-' || *(Board + (posMax.x * y) + x) == '_' || *(Board + (posMax.x * y) + x) == '.')) {
                pos.x = x;
                pos.y = y;
                x = posMax.x;
                y = posMax.y;
            }
        }
    }
    if (pos.x == 0 && pos.y == 0) {
        return posMax;
    }
    return pos;
}

Coord Find_Bridge_last(char* Board, Coord posMax) {
    Coord pos = { posMax.x-1, posMax.y-1 };
    for (int y = posMax.y-1; y >= 0 ; y--) {
        for (int x = posMax.x - 1; x >= 0; x--) {
            if ((*(Board + (posMax.x * y) + x) == '~' || *(Board + (posMax.x * y) + x) == '-' || *(Board + (posMax.x * y) + x) == '_' || *(Board + (posMax.x * y) + x) == '.')) {
                pos.x = x;
                pos.y = y;
                x = -1;
                y = -1;
            }
        }
    }
    return pos;
}

int Is_not_in_bridges(Coord pos, Bridge* Bridges, int Nb_bridge) {
    if(Nb_bridge == 0) return 1;
    for (int i = 0; i < Nb_bridge; i++) {
        for(int y= 0; y < Bridges[i].length; y++){
            if (Bridges[i].pos[y].x == pos.x && Bridges[i].pos[y].y == pos.y) {
                return 0;
            }
		}
	}
    return 1;
}

void Print_board(char* Board, Coord Taille) {
    int i = 0;
    for (i; i < (Taille.x * Taille.y); i++) {
        if (i % Taille.x == 0) {
            printf("\n");
        }
        printf("%c", Board[i]);
    }
    printf("\n");
}

void Test(Bridge* Bridges, int Nb) {
    for (int i = 0; i < Nb; i++) {
        Bridges[i].direction = 0;
        Bridges[i].length = 10;
        Bridges[i].size = 0;
        Bridges[i].pos = NULL;
        Coord* buffer = (Coord*)malloc(sizeof(Coord) * Bridges[i].length);
        if (buffer != NULL) {
            Bridges[i].pos = buffer;
        }
		else {
			printf("Erreur d'allocation");
		}
    }
}

void Stock_bridge(Bridge* Bridges, Coord posMax, char* board, int Nb_bridge_max) {
    int Nb_bridge = 0;
    Coord pos = { 0, 0 };
    while (Nb_bridge != Nb_bridge_max) {

        pos = Find_Bridge(board, posMax);
        //Coord poslast = Find_Bridge_last(board, posMax);
        int direction = 0;
        int width = 0;

        if (*(board + (posMax.x * pos.y) + pos.x) == '~') {
            direction = 1;
            width = 1;
        }
        else if (*(board + (posMax.x * pos.y) + pos.x) == '-') {
            direction = 1;
            width = 0;
        }
        else if (*(board + (posMax.x * pos.y) + pos.x) == '_') {
            direction = 0;
            width = 1;
        }
        else if (*(board + (posMax.x * pos.y) + pos.x) == '.') {
            direction = 0;
            width = 0;
        }

        Coord Copy_pos;
        Copy_pos.x = pos.x;
        Copy_pos.y = pos.y;

        if (Is_not_in_bridges(pos, Bridges, Nb_bridge)) {


            if (direction == 0) { //horizontal
                if (width == 0) {
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;

                    int length = 1;

                    Next_Coord(&pos, 2);
                    while (*(board + (posMax.x * pos.y) + pos.x) == '.') {
                        length++;
                        Next_Coord(&pos, 2);
                    }

                    Bridges[Nb_bridge].length = length;

                    Bridges[Nb_bridge].pos = NULL;
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length);

                    if (buffer != NULL) {
						Bridges[Nb_bridge].pos = buffer;
                    }


                    pos.x = Copy_pos.x;
                    pos.y = Copy_pos.y;

                    for(int i = 0; i < Bridges[Nb_bridge].length; i++){
						Bridges[Nb_bridge].pos[i].x = pos.x;
						Bridges[Nb_bridge].pos[i].y = pos.y;

                        *(board + posMax.x * pos.y + pos.x) = '*';

						Next_Coord(&pos, 2);
					}
                    
                }
                else {
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;
                    int length = 1;

                    Next_Coord(&pos, 2);
                    while (*(board + (posMax.x * pos.y) + pos.x) == '_') {
                        length++;
                        Next_Coord(&pos, 2);
                    }
                    Bridges[Nb_bridge].length = length;

                    Bridges[Nb_bridge].pos = NULL;
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length);

                    if (buffer != NULL) {
                        Bridges[Nb_bridge].pos = buffer;
                    }

                    pos.x = Copy_pos.x;
                    pos.y = Copy_pos.y;

                    for (int i = 0; i < Bridges[Nb_bridge].length; i++) {
                        Bridges[Nb_bridge].pos[i].x = pos.x;
                        Bridges[Nb_bridge].pos[i].y = pos.y;
                        *(board + posMax.x * pos.y + pos.x) = '*';
                        Next_Coord(&pos, 2);
                    }
                }





            }
            else { //vertical
                if (width == 0) {
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;
                    int length = 1;
                    

                    Next_Coord(&pos, 1);
                    while (*(board + (posMax.x * pos.y) + pos.x) == '-') {
                        length++;
                        Next_Coord(&pos, 1);
                    }

                    Bridges[Nb_bridge].length = length;

                    Bridges[Nb_bridge].pos = NULL;
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length);

                    if (buffer != NULL) {
                        Bridges[Nb_bridge].pos = buffer;
                    }

                    pos.x = Copy_pos.x;
                    pos.y = Copy_pos.y;

                    for (int i = 0; i < Bridges[Nb_bridge].length; i++) {
                        Bridges[Nb_bridge].pos[i].x = pos.x;
                        Bridges[Nb_bridge].pos[i].y = pos.y;
                        *(board + posMax.x * pos.y + pos.x) = '*';
                        Next_Coord(&pos, 1);
                    }
                }
                else {
                    Bridges[Nb_bridge].direction = direction;
                    Bridges[Nb_bridge].size = width;
                    int length = 1;
                    

                    Next_Coord(&pos, 1);
                    while (*(board + (posMax.x * pos.y) + pos.x) == '~') {
                        length++;
                        Next_Coord(&pos, 1);
                    }
                    Bridges[Nb_bridge].length = length;

                    Bridges[Nb_bridge].pos = NULL;
                    Coord* buffer = (Coord*)malloc(sizeof(Coord) * length);

                    if (buffer != NULL) {
                        Bridges[Nb_bridge].pos = buffer;
                    }

                    pos.x = Copy_pos.x;
                    pos.y = Copy_pos.y;

                    for (int i = 0; i < Bridges[Nb_bridge].length; i++) {
                        Bridges[Nb_bridge].pos[i].x = pos.x;
                        Bridges[Nb_bridge].pos[i].y = pos.y;
                        *(board + posMax.x * pos.y + pos.x) = '*';
                        Next_Coord(&pos, 1);
                    }
                }
            }

            Nb_bridge += 1;

        }
    }

}
