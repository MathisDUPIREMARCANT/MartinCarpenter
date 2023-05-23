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


        int end = 1;
        int Type_bridge_previous;
        int Type_bridge = 0;
        int Type_island;
        int Direction_available[4];

        *(Board + (posMax.x * pos.y) + pos.x) = '1';
        Islands[Island_current].number = 1;
        Islands[Island_current].pos = pos;

        Island_current++;


        while (Island_current < Nb_island) {
            int a = 1;
            int spa[4];

            for (int i = 0; i < 4; i++) {
                spa[i] = Space_next_bridge(Board, pos, posMax, i);
            }


            for (int i = 0; i < 4; i++) {

                if (spa[i] > 1) {
                    Direction_available[i] = 1;
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
            for (int i = 0;i < 4;i++) {
                if (i != D_pont && Direction_available[i] == 1 && end != 1 && end != Nb_island - 1) {
                    int Length_ramification = Random(1, spa[i] - 1);
                    
                    Ramification(Board, pos, posMax, Bridges, Islands, &Island_current, &Bridge_current, i, Length_ramification);
                    //Il me semble qu'il faut huste mettre Ramification si tu decommente ce qu'il y a en dessous 
                    /*
                    Bridges[Bridge_current].length = length_ramification;
                    Bridges[Bridge_current].size = Type_bridge_ramification;
                    Bridges[Bridge_current].direction = i % 2;

                    Bridges[Bridge_current].pos = (Coord*)malloc(length_ramification * sizeof(Coord));

                    for (int j = 0; j < length_ramification; j++) {
                        Next_Coord(&pos, i);
                        Bridges[Bridge_current].pos[j].x = pos.x;
                        Bridges[Bridge_current].pos[j].y = pos.y;
                    }
                    Next_Coord(&pos, i);
                    Islands[Island_current].pos.x = pos.x;
                    Islands[Island_current].pos.y = pos.y;
                    Islands[Island_current].number = Type_island_ramification;
                    Island_current++;
                    Bridge_current++;
                    for (int h = 0; h <= length_ramification;h++) {
                        switch (i) {
                        case 0:
                            Next_Coord(&pos, 2);
                        case 1:
                            Next_Coord(&pos, 3);
                        case 2:
                            Next_Coord(&pos, 0);
                        case 3:
                            Next_Coord(&pos, 1);
                        }

                    }*/
                    i = 4;

                }
            }
            int length;
            length = Random(1, spa[D_pont] - 1);

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

            if (end == Nb_island - 1) {
                Type_island = Type_bridge_previous + 1;
            }

            Place_island_on_map(Board, posMax, pos, Type_island);

            Islands[Island_current].pos.x = pos.x;
            Islands[Island_current].pos.y = pos.y;
            Islands[Island_current].number = Type_island;


            Island_current++;
            Bridge_current++;
            end++;


        }
        Print_board(Board, posMax);
        From_C_to_Json(Bridges, Islands, Bridge_current, Island_current, posMax);

        Free_game(Bridges, Islands);
        return 0;


    
}
