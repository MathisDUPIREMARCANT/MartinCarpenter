#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

int Map_gen(char* Board, Coord posMax, Coord pos, int Nb_island) {
    
    Island* Islands;
    Bridge* Bridges;
    
    Islands = (Island*)malloc(Nb_island * sizeof(Island));
    Bridges = (Bridge*)malloc(((pos.x*pos.y)-Nb_island) * sizeof(Bridge));

    *(Board + (posMax.x * pos.y) + pos.x) = '1';
    int end = 0;
   
    int Type_bridge = Random(0,1);
    int Type_bridge_precedent = 0;
    int Direction_available[4];
    

    while (end < Nb_island) {
        //int* space = Space_next_bridge(Board, pos, posMax);
       // int* spacopy = Table_copy(space, 4);
        int a = 1;
        int spa[4];

        for (int i = 0; i < 4; i++) {
            spa[i] = Space_next_bridge(Board, pos, posMax, i);
        }
        

        for(int i = 0; i < 4; i++){
            printf("%d\n", spa[i]);

            if (spa[i] >= 1) {
                Direction_available[i] = 1;
            }
            else {
                Direction_available[i] = 0;
            }
        }
        int D_pont;


        while (a) {
            D_pont = Random(0,3);
            if (Direction_available[D_pont] == 1) {
                a = 0;
            }
        }

            int length;
            length = Random(1,spa[D_pont]-1);
            int Type_bridge = Random(0,1);
            for (int i = 0; i < length; i++) {
                Next_Coord(&pos, D_pont);
                Place_bridge_on_map(Board, posMax, pos, Type_bridge);


            }

            Next_Coord(&pos, D_pont);
            Place_island_on_map(Board, posMax, pos, Type_bridge + Type_bridge_precedent +2);
            
            Type_bridge_precedent = Type_bridge;
        end++;
        Print_board(Board, posMax);
    }
}