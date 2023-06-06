#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

int Map_gen(char* Board, Coord posMax, Coord pos, int Nb_island) {
    

    Island* Islands;
    Bridge* Bridges;

    Islands = (Island*)malloc(Nb_island * sizeof(Island));
    Bridges = (Bridge*)malloc(((posMax.x * posMax.y) - Nb_island) * sizeof(Bridge));

    if (Islands != NULL && Bridges != NULL) {


        int Island_current = 0;
        int Bridge_current = 0;


        int Type_bridge_previous;
        int Type_bridge = 0;
        int Type_island;
        int Direction_available[4];
        int Stop_generation = 0;

        *(Board + (posMax.x * pos.y) + pos.x) = '1';
        Islands[Island_current].number = 1;
        Islands[Island_current].pos = pos;

        Island_current++;


        while (Island_current < Nb_island) {
            int a = 1;
            int spa[4];
            //printf("Coord : %d , %d\n", pos.x, pos.y);
            for (int i = 0; i < 4; i++) {
                spa[i] = Space_next_bridge(Board, pos, posMax, i);
                
                //printf("place possible: %d", spa[i]);
                if(spa[i] == 0) {
                    Stop_generation++;
                }
            }
            printf("\n");
            

            int Stop_if_no_places_left = 0;
            for (int i = 0; i < 4; i++) {
                
                if (spa[i] > 1) {
                    Direction_available[i] = 1;
                    Stop_if_no_places_left++;
                }
                else {
                    Direction_available[i] = 0;
                }
            }
            
            
            int D_pont;

            if (No_valid_direction(Direction_available, 4)) {
                return -1;
            }

            while (a) {
                D_pont = Random(0, 3);
                //printf("\n%d", D_pont);
                if (Direction_available[D_pont] == 1) {
                    a = 0;
                }
            }
            
            for (int i = 0; i < 4; i++) {
                if (i != D_pont && Direction_available[i] == 1 && Island_current != 1 && Island_current != Nb_island - 1 ) {
                    int Length_ramification = Random(1, spa[i] - 1);
                    while (Length_ramification > posMax.x / 3) {
                        Length_ramification = Random(1, spa[i] - 1);
                    }

                    Ramification(Board, pos, posMax, Bridges, Islands, Island_current, Bridge_current, i, Length_ramification);
                    Island_current++;
                    Bridge_current++;
                    //i = 4;

                }
                if (i != D_pont && Direction_available[i] == 1 && Island_current != 1 && Island_current != Nb_island - 1 ) {
                    int Length_ramification = Random(1, spa[i] - 1);
                    while (Length_ramification > posMax.x / 3) {
                        Length_ramification = Random(1, spa[i] - 1);
                    }

                    Ramification(Board, pos, posMax, Bridges, Islands, Island_current, Bridge_current, i, Length_ramification);
                    Island_current++;
                    Bridge_current++;

                }
            }
            int length;
            length = Random(1, spa[D_pont] - 1);
            while (length > posMax.x / 3) {
                length = Random(1, spa[D_pont] - 1);
            }

            Bridges[Bridge_current].length = length;
            Bridges[Bridge_current].size = Type_bridge;
            Bridges[Bridge_current].direction = D_pont % 2; //ENUM

            Bridges[Bridge_current].pos = (Coord*)malloc(length * sizeof(Coord));

            for (int i = 0; i < length; i++) {
                Next_Coord(&pos, D_pont);
                Place_bridge_on_map(Board, posMax, pos, Type_bridge);
                Bridges[Bridge_current].pos[i].x = pos.x;
                Bridges[Bridge_current].pos[i].y = pos.y;
            }

            Next_Coord(&pos, D_pont);


            Type_bridge_previous = Type_bridge;
            Type_bridge = Random(0, 1);
            Type_island = Type_bridge_previous + Type_bridge + 2;

            if (Island_current == Nb_island - 1) {
                Type_island = Type_bridge_previous + 1;
            }

            Place_island_on_map(Board, posMax, pos, Type_island);

            Islands[Island_current].pos.x = pos.x;
            Islands[Island_current].pos.y = pos.y;
            Islands[Island_current].number = Type_island;
            

            Island_current++;
            Bridge_current++;
            
            //Print_board(Board, posMax);

        }
        //Print_board(Board, posMax);
        From_C_to_Json(Bridges, Islands, Bridge_current, Island_current, posMax);
        free(Bridges);
        free(Islands);
        //Free_game(Bridges, Islands);
        return;
    }

    
}
