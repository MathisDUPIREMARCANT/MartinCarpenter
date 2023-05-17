#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

int Map_gen(char* Board, Coord posMax, Coord pos, int Nb_island) {
    
    
    Island* Islands;
    Bridge* Bridges;
    
    Islands = (Island*)malloc(Nb_island * sizeof(Island));
    Bridges = (Bridge*)malloc(((posMax.x*posMax.y)-Nb_island) * sizeof(Bridge));
    

    int Island_act = 0;
    int Bridges_act = 0;


    int end = 1;
    int Type_bridge_previous;
    int Type_bridge = 0;
    int Type_island;
    int Direction_available[4];

    *(Board + (posMax.x * pos.y) + pos.x) = '1';
    Islands[Island_act].number = 1;
    Islands[Island_act].pos = pos;

    Island_act++;
    

    while (end < Nb_island) {
        int a = 1;
        int spa[4];

        for (int i = 0; i < 4; i++) {
            spa[i] = Space_next_bridge(Board, pos, posMax, i);
        }
        

        for(int i = 0; i < 4; i++){
//            printf("%d\n", spa[i]);
            
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
            printf("\n%d", D_pont);
            if (Direction_available[D_pont] == 1) {
                a = 0;
            }
        }
        /*for (int i = 0;i < 4;i++) {
            if (i != D_pont && Direction_available[i] == 1 && end != 1) {
                printf("i pour la rami : %d",i);
                int length;
                length = Random(1, spa[i]-1);
                Nb_island = Ramification(Board, pos, posMax, i, Nb_island, length);
                i = 4;
            }
        }*/
        int length;
        length = Random(1,spa[D_pont]-1);

        Bridges[Bridges_act].length = length;
        Bridges[Bridges_act].size = Type_bridge;
        Bridges[Bridges_act].direction = 0; //ENUM

        Bridges[Bridges_act].pos = (Coord*)malloc(length * sizeof(Coord));

        for (int i = 0; i < length; i++) {
            Next_Coord(&pos, D_pont);
            Place_bridge_on_map(Board, posMax, pos, Type_bridge);
            Bridges[Bridges_act].pos[i] = pos;
        }

        Next_Coord(&pos, D_pont);

            
        Type_bridge_previous = Type_bridge;
        Type_bridge = Random(0, 1);
        Type_island = Type_bridge_previous + Type_bridge + 2;

        if (end == Nb_island - 1) {
            Type_island = Type_bridge_previous + 1;
        }

        Place_island_on_map(Board, posMax, pos, Type_island);

        Islands[Island_act].pos = pos;
        Islands[Island_act].number = Type_island;

            
        Island_act++;
        Bridges_act++;
    end++;
        
    }
    //from_C_to_Json(Bridges, Islands, Bridges_act, Islands, posMax);

    //free(Bridges);
    free(Islands);
}